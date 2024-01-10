DELIMITER // 

CREATE OR REPLACE PROCEDURE GetUserInfoAll()
        BEGIN
        -- récupérer les informations d'un utilisateur avec l'ID spécifié
        SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse FROM User;
    END //
DELIMITER ;