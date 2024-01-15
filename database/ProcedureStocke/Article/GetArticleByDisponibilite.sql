DELIMITER //



-- Procédure pour récupérer les informations des articles par rapport a sa disponibilité
    CREATE OR REPLACE  PROCEDURE GetArticleByDisponibilite(p_disponible BOOLEAN)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE disponible = p_disponible ;
    END //
DELIMITER ;
