DELIMITER // 

-- Procédure pour mettre à jour les informations d'un utilisateur
    CREATE OR REPLACE PROCEDURE UpdateUser(
        p_email VARCHAR(128),
        p_telephone VARCHAR(10),
        p_nom VARCHAR(64),
        p_prenom VARCHAR(64),
        p_genre VARCHAR(16),
        p_address VARCHAR(256),
        p_ville VARCHAR(128),
        p_code_postal MEDIUMINT,
        p_complement_adresse VARCHAR(64),
        p_id INT
    )
    BEGIN
        -- Logique pour mettre à jour les informations d'un utilisateur dans la table User
        UPDATE User
        SET email = p_email, telephone = p_telephone, nom = p_nom, prenom = p_prenom
        , genre = p_genre, adresse = p_address, ville = p_ville, code_postal = p_code_postal
        , Complement_adresse = p_complement_adresse
        WHERE id = p_id;
    END //
DELIMITER ;