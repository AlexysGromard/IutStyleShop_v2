DELIMITER //



-- Procédure pour récupérer les informations des article par rapport aux prix
    CREATE OR REPLACE  PROCEDURE GetArticleByPrix(p_prix_min FLOAT,p_prix_max FLOAT)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE prix>= p_prix_min and prix <= p_prix_max;
    END //
DELIMITER ;
