DELIMITER //
-- Procédure pour sortir les informations d'une commande d'un utilisateur
CREATE OR REPLACE  PROCEDURE GetCommande
(
    p_iduser INT
)
BEGIN
    -- Sortir les informations d'une commande
    SELECT * FROM Commande WHERE id = p_iduser;
END //
DELIMITER ;