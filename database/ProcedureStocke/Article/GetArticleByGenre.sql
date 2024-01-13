DELIMITER //



-- Procédure pour récupérer les informations des articles par rapport aux genre
    CREATE OR REPLACE  PROCEDURE GetArticleByGenre(p_genre VARCHAR(16))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE genre = p_genre ;
    END //
DELIMITER ;
