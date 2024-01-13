DELIMITER // 
-- Procédure pour récupérer l'ID d'un utilisateur avec l'email spécifié
 CREATE OR REPLACE PROCEDURE GetUserId(
    p_email VARCHAR(128)
    )
    BEGIN
        -- récupérer l'ID d'un utilisateur avec l'email spécifié
        SELECT id FROM User WHERE email = p_email;
    END //
DELIMITER ;