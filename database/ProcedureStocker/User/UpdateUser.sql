DELIMITER // 

-- Procédure pour mettre à jour les informations d'un utilisateur
    CREATE OR REPLACE PROCEDURE UpdateUser(
        p_id INT,
        p_email VARCHAR(128),
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
        -- Logique pour mettre à jour les informations d'un utilisateur dans la table User
        UPDATE User
        SET email = p_email, password = p_password, nom = p_nom, prenom = p_prenom
        , genre = p_genre, address = p_address, ville = p_ville, code_postal = p_code_postal
        , complement_adresse = p_complement_adresse
        WHERE id = p_id;
    END //
DELIMITER ;