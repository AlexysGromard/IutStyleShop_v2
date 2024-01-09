// DELIMITER


-- Fonction pour récupérer les informations d'un utilisateur
    CREATE OR REPLACE FUNCTION GetUserInfo(p_id INT) RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User WHERE id = p_id;
        RETURN v_cursor;
    END //
DELIMITER ;