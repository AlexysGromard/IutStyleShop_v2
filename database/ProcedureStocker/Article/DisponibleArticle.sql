DELIMITER //
-- Procédure pour rendre un article disponible
    CREATE OR REPLACE PROCEDURE DisponibleArticle(p_id INT)
    BEGIN
        -- Logique pour rendre un article disponible
        -- Utilisez l'ID pour identifier l'article à rendre disponible
        IF (SELECT disponible FROM Article WHERE id = p_id) = TRUE THEN
            UPDATE Article SET disponible = FALSE WHERE id = p_id;
        ELSE
            UPDATE Article SET disponible = TRUE WHERE id = p_id;
        END IF;
    END//
DELIMITER ;