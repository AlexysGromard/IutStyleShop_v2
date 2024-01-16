DELIMITER //
-- Procédure pour sortir les informations d'une commande
CREATE OR REPLACE  PROCEDURE GetCommandeById
(
    p_id INT
)
BEGIN
    -- Sortir les informations d'une commande
    SELECT * FROM Commande WHERE id = p_id;
END //
DELIMITER ;