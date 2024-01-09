// DELIMITER

CREATE OR REPLACE FUNCTION GetUserInfoAll() RETURN SYS_REFCURSOR
        BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User;
        RETURN v_cursor;
    END //
DELIMITER ;