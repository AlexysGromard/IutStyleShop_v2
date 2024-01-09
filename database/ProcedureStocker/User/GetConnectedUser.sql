// DELIMITER

-- Fonction pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
    CREATE OR REPLACE FUNCTION GetConnectedUser() RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'email spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User WHERE email = p_email AND password = BCRYPT(p_password);
        RETURN v_cursor;
    END //
DELIMITER ;