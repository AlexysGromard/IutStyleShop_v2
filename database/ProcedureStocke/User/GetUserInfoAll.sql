DELIMITER // 

CREATE OR REPLACE PROCEDURE GetUserInfoAll()
        BEGIN
        -- récupérer les informations d'un utilisateur avec l'ID spécifié
        SELECT * FROM User;
    END //
DELIMITER ;