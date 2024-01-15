DELIMITER //



-- Procédure pour récupérer les informations des articles par rapport a sa couleur et sa categorie
    CREATE OR REPLACE  PROCEDURE GetArticleByCategorieAndGenre(p_categorie VARCHAR(128),p_genre VARCHAR(16))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SET NAMES utf8mb4;

        SELECT * FROM Article 
        WHERE genre = p_genre COLLATE utf8mb4_general_ci 
        AND category = p_categorie COLLATE utf8mb4_general_ci;
    END //
DELIMITER ;
