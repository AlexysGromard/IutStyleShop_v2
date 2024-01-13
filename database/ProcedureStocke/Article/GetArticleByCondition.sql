DELIMITER //



-- Procédure pour récupérer les informations des  articles  par rapport a differentes condition
    CREATE OR REPLACE  PROCEDURE GetArticleByCondition(p_couleur VARCHAR(32), p_categorie VARCHAR(128),p_prix_min FLOAT,p_prix_max FLOAT)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE couleur = p_couleur and category = p_categorie and prix >= p_prix_min and prix <= p_prix_max;
    END //
DELIMITER ;
