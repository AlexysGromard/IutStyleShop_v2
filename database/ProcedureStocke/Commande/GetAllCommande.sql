DELIMITER //
-- Procédure pour récupérer toutes les commandes
CREATE OR REPLACE PROCEDURE GetAllCommandes()
BEGIN
    -- Sélectionner toutes les commandes
    SELECT *
    FROM Commande;
    
END //
DELIMITER ;