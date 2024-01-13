DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleInfo(p_id INT)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE id = p_id ;
    END //
DELIMITER ;
