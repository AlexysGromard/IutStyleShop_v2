DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleByCategorie(p_categorie VARCHAR(128))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE category = p_categorie ;
    END //
DELIMITER ;
