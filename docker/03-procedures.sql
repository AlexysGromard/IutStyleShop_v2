USE DB_IutStyleShop;

-- ============================================
-- PROCEDURES STOCKÉES - ARTICLE
-- ============================================

DELIMITER //

CREATE PROCEDURE GetAllArticleByNote()
BEGIN
    SELECT * FROM Article ORDER BY notes DESC;
END //

CREATE PROCEDURE GetAllArticle()
BEGIN
    SELECT * FROM Article;
END //

CREATE PROCEDURE GetArticleInfo(IN p_id INT)
BEGIN
    SELECT * FROM Article WHERE id = p_id;
END //

CREATE PROCEDURE GetArticleByCategorie(IN p_category VARCHAR(128))
BEGIN
    SELECT * FROM Article WHERE category = p_category;
END //

CREATE PROCEDURE GetArticleByCategorieAndGenre(IN p_category VARCHAR(128), IN p_genre VARCHAR(16))
BEGIN
    SELECT * FROM Article WHERE category = p_category AND genre = p_genre;
END //

CREATE PROCEDURE GetArticleByGenre(IN p_genre VARCHAR(16))
BEGIN
    SELECT * FROM Article WHERE genre = p_genre;
END //

CREATE PROCEDURE GetArticleByCouleur(IN p_couleur VARCHAR(32))
BEGIN
    SELECT * FROM Article WHERE couleur = p_couleur;
END //

CREATE PROCEDURE GetArticleByPrix(IN p_prix_min FLOAT, IN p_prix_max FLOAT)
BEGIN
    SELECT * FROM Article WHERE prix BETWEEN p_prix_min AND p_prix_max;
END //

CREATE PROCEDURE GetArticleByPromo()
BEGIN
    SELECT * FROM Article WHERE promo > 0 ORDER BY promo DESC;
END //

CREATE PROCEDURE GetArticleByDisponibilite(IN p_disponible BOOLEAN)
BEGIN
    SELECT * FROM Article WHERE disponible = p_disponible;
END //

CREATE PROCEDURE GetAccessoireOrVetement(IN p_id_article INT)
BEGIN
    DECLARE v_type VARCHAR(20);
    
    IF EXISTS (SELECT 1 FROM Accessoire WHERE id_Article = p_id_article) THEN
        SET v_type = 'Accessoire';
        SELECT v_type AS type, quantite FROM Accessoire WHERE id_Article = p_id_article;
    ELSEIF EXISTS (SELECT 1 FROM Vetement WHERE id_Article = p_id_article) THEN
        SET v_type = 'Vetement';
        SELECT v_type AS type, quantite_XS, quantite_S, quantite_M, quantite_L, quantite_XL 
        FROM Vetement WHERE id_Article = p_id_article;
    ELSE
        SELECT 'Unknown' AS type;
    END IF;
END //

CREATE PROCEDURE GetQuantiteAccessoireOrVetement(IN p_id INT)
BEGIN
    IF (SELECT category FROM Article WHERE id = p_id) = 'Accessoire' THEN
        SELECT quantite FROM Accessoire WHERE id_Article = p_id;
    ELSE
        SELECT quantite_XS, quantite_S, quantite_M, quantite_L, quantite_XL 
        FROM Vetement WHERE id_Article = p_id;
    END IF;
END //

CREATE PROCEDURE InsertArticleAccessoire(
    IN p_nom VARCHAR(128),
    IN p_category VARCHAR(128),
    IN p_genre VARCHAR(16),
    IN p_couleur VARCHAR(32),
    IN p_description VARCHAR(256),
    IN p_prix FLOAT,
    IN p_promo TINYINT,
    IN p_quantite INT
)
BEGIN
    DECLARE v_article_id INT;
    
    INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible)
    VALUES (p_nom, p_category, p_genre, p_couleur, p_description, 0, 0, p_prix, p_promo, TRUE);
    
    SET v_article_id = LAST_INSERT_ID();
    
    INSERT INTO Accessoire (id_Article, quantite)
    VALUES (v_article_id, p_quantite);
    
    SELECT v_article_id AS id;
END //

CREATE PROCEDURE InsertArticleVetement(
    IN p_nom VARCHAR(128),
    IN p_category VARCHAR(128),
    IN p_genre VARCHAR(16),
    IN p_couleur VARCHAR(32),
    IN p_description VARCHAR(256),
    IN p_prix FLOAT,
    IN p_promo TINYINT,
    IN p_quantite_XS INT,
    IN p_quantite_S INT,
    IN p_quantite_M INT,
    IN p_quantite_L INT,
    IN p_quantite_XL INT
)
BEGIN
    DECLARE v_article_id INT;
    
    INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible)
    VALUES (p_nom, p_category, p_genre, p_couleur, p_description, 0, 0, p_prix, p_promo, TRUE);
    
    SET v_article_id = LAST_INSERT_ID();
    
    INSERT INTO Vetement (id_Article, quantite_XS, quantite_S, quantite_M, quantite_L, quantite_XL)
    VALUES (v_article_id, p_quantite_XS, p_quantite_S, p_quantite_M, p_quantite_L, p_quantite_XL);
    
    SELECT v_article_id AS id;
END //

CREATE PROCEDURE UpdateArticleAccessoire(
    IN p_id INT,
    IN p_nom VARCHAR(128),
    IN p_category VARCHAR(128),
    IN p_genre VARCHAR(16),
    IN p_couleur VARCHAR(32),
    IN p_description VARCHAR(256),
    IN p_prix FLOAT,
    IN p_promo TINYINT,
    IN p_quantite INT
)
BEGIN
    UPDATE Article 
    SET nom = p_nom, category = p_category, genre = p_genre, 
        couleur = p_couleur, description = p_description, 
        prix = p_prix, promo = p_promo
    WHERE id = p_id;
    
    UPDATE Accessoire SET quantite = p_quantite WHERE id_Article = p_id;
END //

CREATE PROCEDURE UpdateArticleVetement(
    IN p_id INT,
    IN p_nom VARCHAR(128),
    IN p_category VARCHAR(128),
    IN p_genre VARCHAR(16),
    IN p_couleur VARCHAR(32),
    IN p_description VARCHAR(256),
    IN p_prix FLOAT,
    IN p_promo TINYINT,
    IN p_quantite_XS INT,
    IN p_quantite_S INT,
    IN p_quantite_M INT,
    IN p_quantite_L INT,
    IN p_quantite_XL INT
)
BEGIN
    UPDATE Article 
    SET nom = p_nom, category = p_category, genre = p_genre, 
        couleur = p_couleur, description = p_description, 
        prix = p_prix, promo = p_promo
    WHERE id = p_id;
    
    UPDATE Vetement 
    SET quantite_XS = p_quantite_XS, quantite_S = p_quantite_S, 
        quantite_M = p_quantite_M, quantite_L = p_quantite_L, 
        quantite_XL = p_quantite_XL
    WHERE id_Article = p_id;
END //

CREATE PROCEDURE GetImageArticle(IN p_id_article INT)
BEGIN
    SELECT * FROM Image WHERE id_Article = p_id_article;
END //

CREATE PROCEDURE InsertImage(IN p_url VARCHAR(255), IN p_id_article INT)
BEGIN
    INSERT INTO Image (url, id_Article) VALUES (p_url, p_id_article);
END //

CREATE PROCEDURE DeleteImage(IN p_id INT)
BEGIN
    DELETE FROM Image WHERE id = p_id;
END //

CREATE PROCEDURE GetArticleByCondition(
    IN p_couleur VARCHAR(32),
    IN p_category VARCHAR(128),
    IN p_prix_min FLOAT,
    IN p_prix_max FLOAT,
    IN p_genre VARCHAR(16),
    IN p_promo BOOLEAN,
    IN p_disponible BOOLEAN
)
BEGIN
    SELECT * FROM Article 
    WHERE (p_category IS NULL OR category = p_category)
    AND (p_couleur IS NULL OR couleur = p_couleur)
    AND (p_prix_min IS NULL OR prix >= p_prix_min)
    AND (p_prix_max IS NULL OR prix <= p_prix_max)
    AND (
        p_genre IS NULL 
        OR p_genre = 'MF' 
        OR (p_genre = 'M' AND (genre = 'Homme' OR genre = 'Unisexe'))
        OR (p_genre = 'F' AND (genre = 'Femme' OR genre = 'Unisexe'))
    )
    AND (p_promo IS NULL OR (p_promo = 1 AND promo > 0) OR (p_promo = 0))
    AND (p_disponible IS NULL OR disponible = p_disponible);
END //

CREATE PROCEDURE GetArticleForCommande(IN p_id INT)
BEGIN
    SELECT * FROM Article WHERE id = p_id;
END //

CREATE PROCEDURE DisponibleArticle(IN p_id INT)
BEGIN
    SELECT disponible FROM Article WHERE id = p_id;
END //

DELIMITER ;

-- ============================================
-- PROCEDURES STOCKÉES - USER
-- ============================================

DELIMITER //

CREATE PROCEDURE GetUserInfo(IN p_id INT)
BEGIN
    SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse 
    FROM User WHERE id = p_id;
END //

CREATE PROCEDURE GetUserInfoAll()
BEGIN
    SELECT id, email, telephone, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse 
    FROM User;
END //

CREATE PROCEDURE GetConnectedUser(IN p_email VARCHAR(255), IN p_password VARCHAR(255))
BEGIN
    SELECT * FROM User WHERE email = p_email AND password = SHA2(p_password, 256);
END //

CREATE PROCEDURE InsertUser(
    IN p_email VARCHAR(255),
    IN p_telephone VARCHAR(10),
    IN p_password VARCHAR(255),
    IN p_nom VARCHAR(64),
    IN p_prenom VARCHAR(64),
    IN p_genre VARCHAR(16),
    IN p_role VARCHAR(16),
    IN p_adresse VARCHAR(255),
    IN p_ville VARCHAR(128),
    IN p_code_postal MEDIUMINT,
    IN p_complement_adresse VARCHAR(128)
)
BEGIN
    INSERT INTO User (email, telephone, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
    VALUES (p_email, p_telephone, SHA2(p_password, 256), p_nom, p_prenom, p_genre, p_role, p_adresse, p_ville, p_code_postal, p_complement_adresse);
    SELECT LAST_INSERT_ID() AS id;
END //

CREATE PROCEDURE UpdateUser(
    IN p_id INT,
    IN p_email VARCHAR(255),
    IN p_telephone VARCHAR(10),
    IN p_nom VARCHAR(64),
    IN p_prenom VARCHAR(64),
    IN p_genre VARCHAR(16),
    IN p_adresse VARCHAR(255),
    IN p_ville VARCHAR(128),
    IN p_code_postal MEDIUMINT,
    IN p_complement_adresse VARCHAR(128)
)
BEGIN
    UPDATE User 
    SET email = p_email, telephone = p_telephone, nom = p_nom, prenom = p_prenom, 
        genre = p_genre, adresse = p_adresse, ville = p_ville, 
        code_postal = p_code_postal, Complement_adresse = p_complement_adresse
    WHERE id = p_id;
END //

CREATE PROCEDURE UpdatePassword(IN p_id INT, IN p_password VARCHAR(255))
BEGIN
    UPDATE User SET password = SHA2(p_password, 256) WHERE id = p_id;
END //

CREATE PROCEDURE UpdateRole(IN p_id INT, IN p_role VARCHAR(16))
BEGIN
    UPDATE User SET role = p_role WHERE id = p_id;
END //

CREATE PROCEDURE DeleteUser(IN p_id INT)
BEGIN
    DELETE FROM User WHERE id = p_id;
END //

CREATE PROCEDURE GetUserId(IN p_email VARCHAR(255))
BEGIN
    SELECT id FROM User WHERE email = p_email;
END //

CREATE PROCEDURE GetUserNomPrenom(IN p_id INT)
BEGIN
    SELECT nom, prenom FROM User WHERE id = p_id;
END //

DELIMITER ;

-- ============================================
-- PROCEDURES STOCKÉES - COMMENTAIRE
-- ============================================

DELIMITER //

CREATE PROCEDURE GetAllCommentaires()
BEGIN
    SELECT * FROM Commentaire;
END //

CREATE PROCEDURE GetCommentairesByArticle(IN p_id_article INT)
BEGIN
    SELECT id_user AS ID_User, note, commentaire
    FROM Commentaire
    WHERE id_Article = p_id_article
    ORDER BY date_commentaire DESC;
END //

CREATE PROCEDURE GetCommentairesByIds(IN p_id_user INT, IN p_id_article INT)
BEGIN
    SELECT * FROM Commentaire 
    WHERE id_user = p_id_user AND id_Article = p_id_article;
END //

CREATE PROCEDURE InsertCommentaire(
    IN p_id_user INT,
    IN p_id_article INT,
    IN p_note TINYINT,
    IN p_commentaire TEXT
)
BEGIN
    INSERT INTO Commentaire (id_user, id_Article, note, commentaire, date_commentaire)
    VALUES (p_id_user, p_id_article, p_note, p_commentaire, NOW());
END //

CREATE PROCEDURE DeleteCommentaire(IN p_id INT)
BEGIN
    DELETE FROM Commentaire WHERE id = p_id;
END //

DELIMITER ;

-- ============================================
-- PROCEDURES STOCKÉES - PANIER
-- ============================================

DELIMITER //

CREATE PROCEDURE GetAllArticlePanier()
BEGIN
    SELECT * FROM Panier;
END //

CREATE PROCEDURE GetArticlePanier(IN p_id_user INT)
BEGIN
    SELECT * FROM Panier WHERE id_user = p_id_user;
END //

CREATE PROCEDURE InsertPanier(
    IN p_id_user INT,
    IN p_id_article INT,
    IN p_taille VARCHAR(4),
    IN p_quantite TINYINT
)
BEGIN
    INSERT INTO Panier (id_user, id_Article, taille, quantite)
    VALUES (p_id_user, p_id_article, p_taille, p_quantite)
    ON DUPLICATE KEY UPDATE quantite = quantite + p_quantite;
END //

CREATE PROCEDURE UpdateArticlePanier(
    IN p_id_user INT,
    IN p_id_article INT,
    IN p_quantite TINYINT
)
BEGIN
    UPDATE Panier 
    SET quantite = p_quantite 
    WHERE id_user = p_id_user AND id_Article = p_id_article;
END //

CREATE PROCEDURE DeleteArticlePanier(IN p_id_user INT, IN p_id_article INT)
BEGIN
    DELETE FROM Panier WHERE id_user = p_id_user AND id_Article = p_id_article;
END //

CREATE PROCEDURE DeleteAllPanier(IN p_id_user INT)
BEGIN
    DELETE FROM Panier WHERE id_user = p_id_user;
END //

DELIMITER ;

-- ============================================
-- PROCEDURES STOCKÉES - COMMANDE
-- ============================================

DELIMITER //

CREATE PROCEDURE GetAllCommandes()
BEGIN
    SELECT * FROM Commande;
END //

CREATE PROCEDURE GetCommandeById(IN p_id INT)
BEGIN
    SELECT * FROM Commande WHERE id = p_id;
END //

CREATE PROCEDURE GetCommandeByIdUser(IN p_id_user INT)
BEGIN
    SELECT * FROM Commande WHERE id_user = p_id_user ORDER BY date_commande DESC;
END //

CREATE PROCEDURE GetAllArticleOfCommande(IN p_id_commande INT)
BEGIN
    SELECT * FROM ArticleCommande WHERE id_commande = p_id_commande;
END //

CREATE PROCEDURE InsertCommande(
    IN p_id_user INT,
    IN p_prix_total FLOAT,
    IN p_etat VARCHAR(32),
    IN p_id_code_promo INT
)
BEGIN
    INSERT INTO Commande (id_user, prix_total, etat, id_code_promo)
    VALUES (p_id_user, p_prix_total, p_etat, p_id_code_promo);
    SELECT LAST_INSERT_ID() AS id;
END //

CREATE PROCEDURE UpdateStatutCommande(IN p_id INT, IN p_etat VARCHAR(32))
BEGIN
    UPDATE Commande SET etat = p_etat WHERE id = p_id;
END //

CREATE PROCEDURE DeleteCommande(IN p_id INT)
BEGIN
    DELETE FROM Commande WHERE id = p_id;
END //

DELIMITER ;

-- ============================================
-- PROCEDURES STOCKÉES - CODE PROMO
-- ============================================

DELIMITER //

CREATE PROCEDURE GetAllCodePromo()
BEGIN
    SELECT * FROM CodePromo;
END //

CREATE PROCEDURE GetCodePromoById(IN p_id INT)
BEGIN
    SELECT * FROM CodePromo WHERE id = p_id;
END //

CREATE PROCEDURE InsertCodePromo(
    IN p_code VARCHAR(50),
    IN p_reduction TINYINT,
    IN p_date_debut DATE,
    IN p_date_fin DATE
)
BEGIN
    INSERT INTO CodePromo (code, reduction, date_debut, date_fin)
    VALUES (p_code, p_reduction, p_date_debut, p_date_fin);
END //

CREATE PROCEDURE UpdateCodePromo(
    IN p_id INT,
    IN p_code VARCHAR(50),
    IN p_reduction TINYINT,
    IN p_date_debut DATE,
    IN p_date_fin DATE
)
BEGIN
    UPDATE CodePromo 
    SET code = p_code, reduction = p_reduction, 
        date_debut = p_date_debut, date_fin = p_date_fin
    WHERE id = p_id;
END //

CREATE PROCEDURE DeleteCodePromo(IN p_id INT)
BEGIN
    DELETE FROM CodePromo WHERE id = p_id;
END //

DELIMITER ;
