-- Déclaration du package

CREATE PACKAGE ArticlePackage AS

    -- Procédure pour insérer un nouvel article
    PROCEDURE InsertArticle(
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
        p_quantites VARCHAR2
    );

    -- Procédure pour mettre à jour un article existant
    PROCEDURE UpdateArticle(
        p_id INT,
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
        p_quantites VARCHAR2
    );

    -- Procédure pour rendre un article disponible
    PROCEDURE DisponibleArticle(p_id INT);

    -- Fonction pour récupérer les informations d'un article
    FUNCTION GetArticleInfo(p_id INT) RETURNS CURSOR;

    -- Fonction pour calculer la moyenne des notes d'un article
    FUNCTION CalculateAverageNote(p_id INT) RETURNS FLOAT;

    -- Insertion d'une image
    PROCEDURE InsertImage(
        p_id INT,
        p_image VARCHAR(256)
    );

    -- Suppression d'une image
    PROCEDURE DeleteImage(
        p_id INT
    );

END;






-- Déclaration du corps du package


CREATE PACKAGE BODY ArticlePackage AS

    -- Procédure pour insérer un nouvel article
    PROCEDURE InsertArticle(
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    )
    BEGIN
        -- Logique pour insérer un nouvel article dans la table Article
        -- Utilisez l'auto-incrémenté pour obtenir l'ID 
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        INSERT INTO Article (nom, category, genre, couleur, description, prix, promo, disponible) VALUES (p_nom, p_category, p_genre, p_couleur, p_description, p_prix, p_promo, p_disponible);
    END;

    -- Procédure pour mettre à jour un article existant
    PROCEDURE UpdateArticle(
        p_id INT,
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    )
    BEGIN
        -- Logique pour mettre à jour un article dans la table Article
        -- Utilisez l'ID pour identifier l'article à mettre à jour
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        UPDATE Article
        SET nom = p_nom, category = p_category, genre = p_genre, couleur = p_couleur,
            description = p_description, prix = p_prix, promo = p_promo, disponible = p_disponible
        WHERE id = p_id;
    END;

    -- Procédure pour rendre un article disponible
    PROCEDURE DisponibleArticle(p_id INT)
    BEGIN
        -- Logique pour rendre un article disponible
        -- Utilisez l'ID pour identifier l'article à rendre disponible
        IF (SELECT disponible FROM Article WHERE id = p_id) = TRUE THEN
            UPDATE Article SET disponible = FALSE WHERE id = p_id;
        ELSE
            UPDATE Article SET disponible = TRUE WHERE id = p_id;
        END IF;
    END;


    -- Fonction pour récupérer les informations d'un article
    FUNCTION GetArticleInfo(p_id INT) RETURNS CURSOR
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        RETURN QUERY SELECT * FROM Article WHERE id = p_id;
    END;

    -- Procédure pour insérer une image
    PROCEDURE InsertImage(
        p_id INT,
        p_image VARCHAR(256)
    )
    BEGIN
        -- Logique pour insérer une image dans la table Image
        INSERT INTO Image (lien ,ID_article) VALUES (p_image, p_id);
    END;

    -- Procédure pour supprimer une image
    PROCEDURE DeleteImage(
        p_id INT
    )
    BEGIN
        -- Logique pour supprimer une image de la table Image
        DELETE FROM Image WHERE ID_article = p_id;
    END;
    
END;



