DELIMITER //

CREATE OR REPLACE  PROCEDURE GetCommande
(
    p_iduser INT
)
BEGIN
    -- Sortir les informations d'une commande
    SELECT * FROM Commande WHERE id = p_iduser;

    -- Sélectionner les articles de la commande pour l'utilisateur spécifié
    SELECT ca.ID_commande, ca.ID_article, ca.taille, ca.prix_unitaire, ca.quantite
    FROM CommandeArticle ca
    INNER JOIN Commande c ON c.ID_commande = ca.ID_commande
    WHERE c.ID_user = p_id_user;
END //
DELIMITER ;