DELIMITER //
-- Procédure pour récupérer le nom et couleur de l'article
    CREATE OR REPLACE  PROCEDURE GetArticleForCommande(
        p_id INT
        )
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        SELECT nom, couleur FROM Article WHERE id = p_id;
    END //
DELIMITER ;


