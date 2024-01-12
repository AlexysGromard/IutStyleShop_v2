DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleByCouleur(p_couleur VARCHAR(32))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE couleur = p_couleur ;
    END //
DELIMITER ;
