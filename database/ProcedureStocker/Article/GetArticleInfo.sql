DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleInfo(p_id INT, OUT p_article TEXT, OUT p_image TEXT, OUT p_accessoire_or_vetement TEXT)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE id = p_id INTO p_article;
        SELECT * FROM Image WHERE ID_article = p_id INTO p_image;
        IF (SELECT category FROM Article WHERE id = p_id) = 'accessoire' THEN
            SELECT * FROM Accessoire WHERE ID_article = p_id INTO p_accessoire_or_vetement;
        ELSE
            SELECT * FROM Vetement WHERE ID_article = p_id INTO p_accessoire_or_vetement;
        END IF;
    END //
DELIMITER ;