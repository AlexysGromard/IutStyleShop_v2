DELIMITER // 


-- PROCEDURE pour récupérer les informations d'un utilisateur
    CREATE OR REPLACE PROCEDURE GetUserNomPrenom(
        p_id INT
    )
    BEGIN
    -- récupérer les informations d'un utilisateur avec l'ID spécifié
     SELECT nom, prenom FROM User WHERE id = p_id;
    END //
DELIMITER ;