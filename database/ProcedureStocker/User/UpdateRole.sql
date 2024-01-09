// DELIMITER

-- update role
    CREATE OR REPLACE PROCEDURE UpdateRole(
        p_id INT,
        p_role VARCHAR(16)
    )
    BEGIN
        -- Logique pour mettre à jour le role d'un utilisateur dans la table User
        UPDATE User
        SET role = p_role
        WHERE id = p_id;
    END //
DELIMITER ;