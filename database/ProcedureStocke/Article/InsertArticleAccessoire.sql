DELIMITER //



-- Procédure pour insérer un nouvel article
    CREATE OR REPLACE PROCEDURE InsertArticleAccessoire(
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
        p_genre VARCHAR(16),
        p_couleur VARCHAR(32),
        p_description VARCHAR(256),
        p_prix FLOAT,
        p_promo TINYINT,
        p_disponible BOOLEAN,
        p_quantite INT
    )
    BEGIN
        -- Logique pour insérer un nouvel article dans la table Article
        -- Utilisez l'auto-incrémenté pour obtenir l'ID 
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        DECLARE last_id INT;
        DECLARE last_id_2 INT;
        SET @last_id = 0;
        SET @last_id_2 = 0;
        -- SELECT MAX(Article.id) FROM Article;
        -- INSERT INTO Article (nom, category, genre, couleur, description,votant,notes, prix, promo, disponible) VALUES (p_nom, p_category, p_genre, p_couleur, p_description,0,0.0, p_prix, p_promo, p_disponible);
        -- SELECT MAX(id) INTO @last_id_2 FROM Article;
        -- IF last_id_2 >= last_id + 2 THEN
        --     SIGNAL SQLSTATE '45251' SET MESSAGE_TEXT = 'Deux accessoires ont été ajouté en même temps !';
        -- ELSE
        --     INSERT INTO Accessoire (id_Article, quantite) VALUES (last_id_2, quantite);
        -- END IF;
        -- SELECT id from Article WHERE id = last_id_2;

        END //
DELIMITER ;