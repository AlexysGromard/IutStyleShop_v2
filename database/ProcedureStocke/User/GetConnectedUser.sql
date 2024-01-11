DELIMITER //

-- Procedure pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
CREATE OR REPLACE PROCEDURE GetConnectedUser(
    IN p_email VARCHAR(128),
    IN p_password VARCHAR(64)
)
BEGIN
    -- récupérer les informations d'un utilisateur avec l'email spécifié et le password
    SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse FROM User WHERE email = p_email AND password = SHA2(p_password, 256);
END //

DELIMITER ;
