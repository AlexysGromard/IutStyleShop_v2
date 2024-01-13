DELIMITER //

-- Procedure pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
CREATE OR REPLACE PROCEDURE GetConnectedUser(
    IN p_email VARCHAR(128),
    IN p_password VARCHAR(64)
)
BEGIN
    DECLARE email_param VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    DECLARE password_param VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

    SET email_param = p_email;
    SET password_param = SHA2(p_password, 256);

    SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse
    FROM User
    WHERE email = email_param AND password = password_param;
END //

DELIMITER ;


