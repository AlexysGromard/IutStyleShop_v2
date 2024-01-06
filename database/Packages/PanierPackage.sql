

CREATE OR REPLACE PACKAGE PanierPackage AS

    -- Procédure pour ajouter un article au panier
    PROCEDURE InsertPanier(
        p_id_user INT,
        p_id_article INT,
        p_taille VARCHAR(4),
        p_quantite TINYINT
    );

    -- Procédure pour supprimer un article du panier
    PROCEDURE DeleteOneArticlePanier(
        p_id_user INT,
        p_id_article INT
    );

    -- Procédure pour supprimer tous les articles du panier
    PROCEDURE DeleteAllArticlePanier(
        p_id_user INT
    );

    -- Fonction pour récupérer le contenu du panier d'un utilisateur
    FUNCTION GetContenuPanier(p_id_user INT) RETURN SYS_REFCURSOR;

END PanierPackage;


CREATE OR REPLACE PACKAGE BODY PanierPackage AS

    -- Procédure pour ajouter un article au panier
    PROCEDURE InsertPanier(
        p_id_user INT,
        p_id_article INT,
        p_taille VARCHAR(4),
        p_quantite TINYINT
    ) IS
    BEGIN
        -- Ajouter un article au panier
        INSERT INTO Panier (ID_User, ID_Article, taille, quantite)
        VALUES (p_id_user, p_id_article, p_taille, p_quantite);
    END AjouterAuPanier;

    -- Procédure pour supprimer un article du panier
    PROCEDURE DeleteOneArticlePanier(
        p_id_user INT,
        p_id_article INT
    ) IS
    BEGIN
        -- Supprimer un article du panier
        DELETE FROM Panier
        WHERE ID_User = p_id_user AND ID_Article = p_id_article;
    END SupprimerDuPanier;

    -- Procédure pour supprimer tous les articles du panier
    PROCEDURE DeleteAllArticlePanier(
        p_id_user INT
    ) IS
    BEGIN
        -- Supprimer tous les articles du panier
        DELETE FROM Panier
        WHERE ID_User = p_id_user;
    END SupprimerToutDuPanier;

    -- Fonction pour récupérer le contenu du panier d'un utilisateur
    FUNCTION GetContenuPanier(p_id_user INT) RETURN SYS_REFCURSOR IS
        -- Déclaration d'un curseur pour récupérer le contenu du panier
        v_cursor SYS_REFCURSOR;
    BEGIN
        -- Sélectionner le contenu du panier de l'utilisateur spécifié
        OPEN v_cursor FOR
        SELECT ID_Article, taille, quantite
        FROM Panier
        WHERE ID_User = p_id_user;

        -- Retourner le curseur
        RETURN v_cursor;
    END GetContenuPanier;

END PanierPackage;



