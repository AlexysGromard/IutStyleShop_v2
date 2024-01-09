DELIMITER //

CREATE OR REPLACE  PROCEDURE InsertCommande(
    p_iduser INT,
    p_idcodepromo INT
)
BEGIN

    -- Déclaration d'une variable pour le prix total de la commande
    DECLARE v_prixTotal FLOAT;

    -- Ajouter une nouvelle commande à la table Commande
    INSERT INTO Commande (ID_user,statut )
    VALUES (p_id_user,'en cours');
    
    -- Boucle qui insert tous les articles du panier dans la table CommandeArticle
    FOR i IN (SELECT ID_article, taille, quantite FROM Panier WHERE ID_user = p_id_user) LOOP
        INSERT INTO CommandeArticle (ID_commande, ID_article, taille ,prix_unitaire, quantite)
        VALUES ((SELECT MAX(ID) FROM Commande), i.ID_article, i.taille, SELECT prix * (1 - promo) * (1 - promoglobale) FROM Article WHERE ID = i.ID_article ,i.quantite);
        -- Calculer le prix total de la commande
        v_prix_total := v_prix_total + (SELECT prix * (1 - promo) * (1 - COALESCE((SELECT promo FROM CodePromo WHERE ID = p_id_CodePromo LIMIT 1), 0.0)) FROM Article WHERE ID = i.ID_article) * i.quantite;
    END LOOP;

    -- Mettre à jour le prix total de la commande
    UPDATE Commande SET prix_total = v_prix_total WHERE ID = (SELECT MAX(ID) FROM Commande);

    -- Supprimer tous les articles du panier
    DELETE FROM Panier WHERE ID_user = p_id_user;


END //
DELIMITER ;