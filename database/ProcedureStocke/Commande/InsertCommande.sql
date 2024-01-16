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
    VALUES (p_iduser, 'En cours', (SELECT SUM(Article.prix * quantite) FROM Panier INNER JOIN Article ON Panier.ID_article = Article.ID WHERE ID_user = p_iduser));

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO v_ID_article, v_taille, v_quantite;
        IF done THEN
            LEAVE read_loop;
        END IF;

        INSERT INTO ArticleCommande (ID_commande, ID_article, taille ,prix_unitaire, quantite)
        VALUES ((SELECT MAX(ID) FROM Commande), v_ID_article, v_taille, (SELECT prix * (1 - promo) * (1 - COALESCE((SELECT promo FROM CodePromo WHERE ID = p_idcodepromo LIMIT 1), 0.0)) FROM Article WHERE ID = v_ID_article) ,v_quantite);
    END LOOP;

    CLOSE cur;
END //
DELIMITER ;