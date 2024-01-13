DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetArticleByCouleurAndCategorie(p_couleur VARCHAR(32), p_categorie VARCHAR(128))
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT * FROM Article WHERE couleur = p_couleur and category = p_categorie;
    END //
DELIMITER ;
