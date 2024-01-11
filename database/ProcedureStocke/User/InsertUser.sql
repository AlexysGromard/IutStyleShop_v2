DELIMITER //

-- Procédure pour insérer un nouvel utilisateur qui est un client
CREATE OR REPLACE PROCEDURE InsertUserClient(
    p_email VARCHAR(128),
    p_telephone VARCHAR(10),
    p_password VARCHAR(64),
    p_nom VARCHAR(64),
    p_prenom VARCHAR(64),
    p_genre VARCHAR(16),
    p_address VARCHAR(256),
    p_ville VARCHAR(128),
    p_code_postal MEDIUMINT,
    p_complement_adresse VARCHAR(64)
)
BEGIN
    -- Logique pour insérer un nouvel utilisateur dans la table User
    INSERT INTO User (email, telephone, password, nom, prenom, role, address, ville, code_postal, complement_adresse)
    VALUES (p_email, p_telephone, SHA2(p_password, 256), p_nom, p_prenom, p_genre, 'client', p_address, p_ville, p_code_postal, p_complement_adresse);
END //

DELIMITER ;