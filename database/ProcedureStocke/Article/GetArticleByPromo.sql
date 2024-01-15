DELIMITER //



-- Procédure pour récupérer les informations des articles en promotion
    CREATE OR REPLACE  PROCEDURE GetArticleByPromo(p_promo TINYINT(1))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE ( (p_promo = 1 AND promo > 0) OR (p_promo = 0 AND promo = 0) )  ;
    END //
DELIMITER ;
