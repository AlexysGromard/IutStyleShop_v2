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
    );

    -- Procédure pour supprimer un article
    PROCEDURE DeleteArticle(p_id INT);

    -- Fonction pour récupérer les informations d'un article
    FUNCTION GetArticleInfo(p_id INT) RETURNS CURSOR;

    -- Procédure pour enregistrer un vote pour un article
    PROCEDURE VoteForArticle(p_id INT, p_note FLOAT);

    -- Fonction pour calculer la moyenne des notes d'un article
    FUNCTION CalculateAverageNote(p_id INT) RETURNS FLOAT;

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

    -- Procédure pour supprimer un article
    PROCEDURE DeleteArticle(p_id INT)
    BEGIN
        -- Logique pour supprimer un article de la table Article
        -- Utilisez l'ID pour identifier l'article à supprimer
        DELETE FROM Article WHERE id = p_id;
    END;

    -- Fonction pour récupérer les informations d'un article
    FUNCTION GetArticleInfo(p_id INT) RETURNS CURSOR
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        RETURN QUERY SELECT * FROM Article WHERE id = p_id;
    END;

    -- Procédure pour enregistrer un vote pour un article
    PROCEDURE VoteForArticle(p_id INT, p_note FLOAT)
    BEGIN
        -- Logique pour enregistrer un vote pour un article
        -- Utilisez l'ID pour identifier l'article à voter
        -- Ajoutez des validations si nécessaire (Note doit être dans une plage, etc.)
        -- UPDATE Article SET votant = votant + 1, notes = notes + p_note WHERE id = p_id;
    END;

    -- Fonction pour calculer la moyenne des notes d'un article
    FUNCTION CalculateAverageNote(p_id INT) RETURNS FLOAT
    BEGIN
        -- Logique pour calculer la moyenne des notes d'un article avec l'ID spécifié
        -- Utilisez l'ID pour identifier l'article
        DECLARE v_average_note FLOAT;
        SELECT notes INTO v_average_note FROM Article WHERE id = p_id;
        RETURN v_average_note;
    END;

END;






CREATE OR REPLACE PACKAGE ArticlePackage AS

    -- Procédure pour insérer un nouvel article
    PROCEDURE InsertArticle(
        p_nom VARCHAR2,
        p_category VARCHAR2,
        p_genre VARCHAR2,
        p_couleur VARCHAR2,
        p_description VARCHAR2,
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    );

    -- Procédure pour mettre à jour un article existant
    PROCEDURE UpdateArticle(
        p_id INT,
        p_nom VARCHAR2,
        p_category VARCHAR2,
        p_genre VARCHAR2,
        p_couleur VARCHAR2,
        p_description VARCHAR2,
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    );

    -- Procédure pour supprimer un article
    PROCEDURE DeleteArticle(p_id INT);

    -- Fonction pour récupérer les informations d'un article
    FUNCTION GetArticleInfo(p_id INT) RETURN SYS_REFCURSOR;

    -- Procédure pour enregistrer un vote pour un article
    PROCEDURE VoteForArticle(p_id INT, p_note FLOAT);

    -- Fonction pour calculer la moyenne des notes d'un article
    FUNCTION CalculateAverageNote(p_id INT) RETURN FLOAT;

END ArticlePackage;


CREATE OR REPLACE PACKAGE BODY ArticlePackage AS

    PROCEDURE InsertArticle(
        p_nom VARCHAR2,
        p_category VARCHAR2,
        p_genre VARCHAR2,
        p_couleur VARCHAR2,
        p_description VARCHAR2,
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    ) IS
    BEGIN
        -- Logique pour insérer un nouvel article dans la table Article
        -- Utilisez l'auto-incrémenté pour obtenir l'ID 
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        INSERT INTO Article (nom, category, genre, couleur, description, prix, promo, disponible) VALUES (p_nom, p_category, p_genre, p_couleur, p_description, p_prix, p_promo, p_disponible);
    END InsertArticle;

    PROCEDURE UpdateArticle(
        p_id INT,
        p_nom VARCHAR2,
        p_category VARCHAR2,
        p_genre VARCHAR2,
        p_couleur VARCHAR2,
        p_description VARCHAR2,
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN
    ) IS
    BEGIN
        -- Logique pour mettre à jour un article dans la table Article
        -- Utilisez l'ID pour identifier l'article à mettre à jour
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        UPDATE Article
        SET nom = p_nom, category = p_category, genre = p_genre, couleur = p_couleur,
            description = p_description, prix = p_prix, promo = p_promo, disponible = p_disponible
        WHERE id = p_id;
    END UpdateArticle;

    PROCEDURE DeleteArticle(p_id INT) IS
    BEGIN
        -- Logique pour supprimer un article de la table Article
        -- Utilisez l'ID pour identifier l'article à supprimer
        DELETE FROM Article WHERE id = p_id;
    END DeleteArticle;

    FUNCTION GetArticleInfo(p_id INT) RETURN SYS_REFCURSOR IS
        -- Déclaration d'un curseur pour récupérer les informations de l'article
        v_cursor SYS_REFCURSOR;
    BEGIN
        -- Logique pour récupérer les informations de l'article avec l'ID spécifié
        OPEN v_cursor FOR SELECT * FROM Article WHERE id = p_id;
        RETURN v_cursor;
        RETURN NULL; -- À ajuster selon la logique réelle
    END GetArticleInfo;

    PROCEDURE VoteForArticle(p_id INT, p_note FLOAT) IS
    BEGIN
        -- Logique pour enregistrer un vote pour un article
        -- Utilisez l'ID pour identifier l'article à voter
        -- Ajoutez des validations si nécessaire (Note doit être dans une plage, etc.)
        -- UPDATE Article SET votant = votant + 1, notes = notes + p_note WHERE id = p_id;
    END VoteForArticle;

    FUNCTION CalculateAverageNote(p_id INT) RETURN FLOAT IS
        -- Déclaration d'une variable pour stocker la moyenne des notes
        v_average_note FLOAT;
    BEGIN
        -- Logique pour calculer la moyenne des notes d'un article avec l'ID spécifié
        -- Utilisez l'ID pour identifier l'article
        SELECT notes INTO v_average_note FROM Article WHERE id = p_id;
        RETURN v_average_note;
    END CalculateAverageNote;

END ArticlePackage;
/
