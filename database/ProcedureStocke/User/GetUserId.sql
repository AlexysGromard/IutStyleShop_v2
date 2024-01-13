DELIMITER // 

 CREATE OR REPLACE PROCEDURE GetUserId(
    p_email VARCHAR(128)
    )
    BEGIN
        -- récupérer l'ID d'un utilisateur avec l'email spécifié
        SELECT id FROM User WHERE email COLLATE utf8mb4_general_ci = p_email COLLATE utf8mb4_general_ci;
    END; //
DELIMITER ;