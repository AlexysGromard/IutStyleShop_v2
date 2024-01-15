DELIMITER //



-- Procédure pour récupérer les informations des articles par rapport aux genre
    CREATE OR REPLACE  PROCEDURE GetAllArticleByNote()
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article ORDER BY notes DESC ;
    END //
DELIMITER ;
