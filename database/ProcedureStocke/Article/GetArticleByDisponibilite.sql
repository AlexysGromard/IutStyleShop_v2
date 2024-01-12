DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleByDisponibilite(p_disponible BOOLEAN)
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE disponible = p_disponible ;
    END //
DELIMITER ;
