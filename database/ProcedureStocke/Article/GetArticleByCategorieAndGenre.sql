DELIMITER //



-- Procédure pour récupérer les informations des articles par rapport a sa couleur et sa categorie
    CREATE OR REPLACE  PROCEDURE GetArticleByCategorieAndGenre(p_categorie VARCHAR(128),p_genre VARCHAR(16))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE genre = p_genre and category = p_categorie;
    END //
DELIMITER ;
