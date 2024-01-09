// DELIMITER

-- Procédure pour supprimer un utilisateur
    CREATE OR REPLACE PROCEDURE DeleteUser(p_id INT)
    BEGIN
        -- Logique pour supprimer un utilisateur de la table User
        DELETE FROM User WHERE id = p_id;
    END //
DELIMITER ;