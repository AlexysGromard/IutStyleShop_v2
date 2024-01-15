DELIMITER //



-- Procédure pour récupérer les informations des articles en promotion
    CREATE OR REPLACE  PROCEDURE GetArticleByPromo()
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE promo > 0 ;
    END //
DELIMITER ;
