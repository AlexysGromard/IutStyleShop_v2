DELIMITER //

-- Update password
CREATE OR REPLACE PROCEDURE UpdatePassword(
    p_id INT,
    p_password VARCHAR(64)
)
BEGIN
    -- Logique pour mettre à jour le mot de passe d'un utilisateur dans la table User
    UPDATE User
    SET password = SHA2(p_password, 256)
    WHERE id = p_id;
END //

DELIMITER ;