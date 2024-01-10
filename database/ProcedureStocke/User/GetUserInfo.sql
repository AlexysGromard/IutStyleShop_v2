DELIMITER // 


-- PROCEDURE pour récupérer les informations d'un utilisateur
    CREATE OR REPLACE PROCEDURE GetUserInfo(
        p_id INT
    )
    BEGIN
    -- récupérer les informations d'un utilisateur avec l'ID spécifié
     SELECT * FROM User WHERE id = p_id;
    END //
DELIMITER ;