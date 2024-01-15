DELIMITER //



-- Procédure pour mettre à jour un article existant
    CREATE OR REPLACE PROCEDURE UpdateArticleAccessoire(
        p_id INT,
        p_nom VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN,
        p_quantite INT
    )
    BEGIN
        -- Logique pour mettre à jour un article dans la table Article
        -- Utilisez l'ID pour identifier l'article à mettre à jour
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        UPDATE Article
        SET nom = p_nom, genre = p_genre, couleur = p_couleur,
            description = p_description, prix = p_prix, promo = p_promo, disponible = p_disponible
        WHERE id = p_id;

        
        UPDATE Accessoire
        SET quantite = p_quantite
        WHERE id_Article = p_id;


    END //
DELIMITER ;