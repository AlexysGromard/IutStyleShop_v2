DELIMITER //
-- Procédure pour supprimer une commande
CREATE OR REPLACE  PROCEDURE DeleteCommande(
    p_id INT
)
BEGIN
    -- supprimer une commande de la table Commande
    DELETE FROM CommandeArticle WHERE ID_commande = p_id;
    DELETE FROM Commande WHERE id = p_id;
END //
DELIMITER ;