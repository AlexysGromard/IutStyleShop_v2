DELIMITER //

CREATE OR REPLACE PROCEDURE GetAllCommandes()
BEGIN
    -- Sélectionner toutes les commandes
    SELECT *
    FROM Commande;

    -- Sélectionner tous les articles de chaque commande
    SELECT *
    FROM CommandeArticle;
    
END //
DELIMITER ;