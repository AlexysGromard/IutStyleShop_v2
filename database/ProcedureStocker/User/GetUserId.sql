// DELIMITER

 CREATE OR REPLACE FUNCTION GetUserId(p_email VARCHAR(128)) RETURN INT
    BEGIN
        -- Logique pour récupérer l'ID d'un utilisateur avec l'email spécifié
        DECLARE v_id INT;
        SELECT id INTO v_id FROM User WHERE email = p_email;
        RETURN v_id;
    END //
DELIMITER ;