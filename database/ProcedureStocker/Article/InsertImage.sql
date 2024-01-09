DELIMITER //



-- Procédure pour insérer une image
    CREATE OR REPLACE PROCEDURE InsertImage(
        p_id INT,
        p_image VARCHAR(256)
    )
    BEGIN
        -- Logique pour insérer une image dans la table Image
        INSERT INTO Image (lien ,ID_article) VALUES (p_image, p_id);
    END //
DELIMITER;