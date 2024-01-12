DELIMITER //



-- Procédure pour mettre à jour un article existant
    CREATE OR REPLACE PROCEDURE UpdateArticleVetement(
        p_id INT,
        p_nom VARCHAR(128),
        p_categorie VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN,
        p_quantiteXS INT,
        p_quantiteS INT,
        p_quantiteM INT,
        p_quantiteL INT,
        p_quantiteXL INT

    )
    BEGIN
        -- Logique pour mettre à jour un article dans la table Article
        -- Utilisez l'ID pour identifier l'article à mettre à jour
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        UPDATE Article
        SET nom = p_nom, category = p_categorie, genre = p_genre, couleur = p_couleur,
            description = p_description, prix = p_prix, promo = p_promo, disponible = p_disponible
        WHERE id = p_id;

        UPDATE Vetement
        SET quantiteXS = p_quantiteXS, quantiteS = p_quantiteS, quantiteM = p_quantiteM, quantiteL = p_quantiteL, quantiteXL=p_quantiteXL
        WHERE id_Article = p_id;

    END //
DELIMITER ;