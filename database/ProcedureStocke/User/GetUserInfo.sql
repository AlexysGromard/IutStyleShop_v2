DELIMITER // 


-- PROCEDURE pour récupérer les informations d'un utilisateur
    CREATE OR REPLACE PROCEDURE GetUserInfo(
        p_id INT
    )
    BEGIN
    -- récupérer les informations d'un utilisateur avec l'ID spécifié
     SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse FROM User WHERE id = p_id;
    END //
DELIMITER ;