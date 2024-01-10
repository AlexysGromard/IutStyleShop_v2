DELIMITER // 

-- Procedure pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
    CREATE OR REPLACE PROCEDURE GetConnectedUser(
        IN p_email VARCHAR(128),
        IN p_password VARCHAR(64)
    )
    BEGIN
        -- récupérer les informations d'un utilisateur avec l'email spécifié et le password
        SELECT * FROM User WHERE email = p_email AND password = PASSWORD(p_password);
    END //
DELIMITER ;