DELIMITER //



-- Procédure pour insérer un nouvel article
    CREATE OR REPLACE PROCEDURE InsertArticleVetement(
        p_nom VARCHAR(128),
        p_category VARCHAR(128),
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
        -- Logique pour insérer un nouvel article dans la table Article
        -- Utilisez l'auto-incrémenté pour obtenir l'ID 
        -- Ajoutez des validations si nécessaire
        -- (Vérification de la plage de promo, etc.)
        DECLARE last_id INT;
        DECLARE last_id_2 INT;
        SET @last_id = LAST_INSERT_ID() ;
        INSERT INTO Article (nom, category, genre, couleur, description, prix, promo, disponible) VALUES (p_nom, p_category, p_genre, p_couleur, p_description, p_prix, p_promo, p_disponible);
        SET @last_id_2 = LAST_INSERT_ID() ;       
        IF last_id_2 >= last_id + 2 THEN
            SIGNAL SQLSTATE '45151' SET MESSAGE_TEXT = 'Deux articles ont été ajouté en même temps !';
        ELSE
            INSERT INTO Vetement (idArticle, quantiteXS, quantiteS ,quantiteM ,quantiteL, quantiteXL) VALUES (last_id_2, p_quantiteXS, p_quantiteS ,p_quantiteM ,p_quantiteL,p_quantiteXL);
        END IF;
    END //
DELIMITER ;