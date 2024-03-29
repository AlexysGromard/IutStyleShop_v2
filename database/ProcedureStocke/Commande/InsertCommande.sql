DELIMITER //
-- Procédure pour insérer une commande
CREATE OR REPLACE  PROCEDURE InsertCommande(
    p_iduser INT,
    p_idcodepromo INT
)
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE v_ID_article, v_quantite INT;
    DECLARE v_taille VARCHAR(255);
    DECLARE cur CURSOR FOR SELECT ID_article, taille, quantite FROM Panier WHERE ID_user = p_iduser;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

	INSERT INTO Commande (id_user, statut, prix)
	VALUES (
		p_iduser, 
		'En cours', 
		CASE 
			WHEN EXISTS (SELECT 1 FROM CodePromo WHERE ID = p_idcodepromo) 
			THEN round((SELECT SUM(Article.prix * quantite) * (1 - (SELECT promo FROM CodePromo WHERE ID = p_idcodepromo LIMIT 1) / 100) FROM Panier INNER JOIN Article ON Panier.ID_article = Article.ID WHERE ID_user = p_iduser), 2)
			ELSE round((SELECT SUM(Article.prix * quantite) FROM Panier INNER JOIN Article ON Panier.ID_article = Article.ID WHERE ID_user = p_iduser), 2)
		END
	);

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO v_ID_article, v_taille, v_quantite;
        IF done THEN
            LEAVE read_loop;
        END IF;

        INSERT INTO ArticleCommande (ID_commande, ID_article, taille, prix_unitaire, quantite)
        VALUES (
            (SELECT MAX(ID) FROM Commande), 
            v_ID_article, 
            v_taille, 
            ROUND(
                (SELECT 
                    CASE 
                        WHEN EXISTS (SELECT 1 FROM CodePromo WHERE ID = p_idcodepromo) 
                        THEN prix * (1 - (SELECT promo FROM CodePromo WHERE ID = p_idcodepromo LIMIT 1) / 100)
                        ELSE prix
                    END
                FROM Article WHERE ID = v_ID_article),
                2
            ),
            v_quantite
        );
    END LOOP;
    
    CLOSE cur;
END //
DELIMITER ;