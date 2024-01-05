DELIMITER //

CREATE OR REPLACE PACKAGE CommentairePackages AS

    -- Procédure pour ajouter un nouveau commentaire
    PROCEDURE InsertCommentaire(
        p_id_user INT,
        p_id_article INT,
        p_note FLOAT,
        p_commentaire VARCHAR(512)
    );

    -- Procédure pour supprimer un commentaire
    PROCEDURE DeleteCommentaire(p_id INT);

    -- Fonction pour récupérer les commentaires d'un article
    FUNCTION GetCommentaires(p_id_article INT) RETURN SYS_REFCURSOR;

END CommentairePackages;

//

CREATE OR REPLACE PACKAGE BODY CommentairePackages AS

    -- Procédure pour ajouter un nouveau commentaire
    PROCEDURE InsertCommentaire(
        p_id_user INT,
        p_id_article INT,
        p_note FLOAT,
        p_commentaire VARCHAR(512)
    ) IS
    BEGIN
        -- Ajouter un nouveau commentaire à la table Commentaire
        INSERT INTO Commentaire (ID_user, ID_article, note, commentaire)
        VALUES (p_id_user, p_id_article, p_note, p_commentaire);
    END AjouterCommentaire;

    -- Procédure pour supprimer un commentaire
    PROCEDURE DeleteCommentaire(p_id INT) IS
    BEGIN
        -- Supprimer le commentaire de la table Commentaire
        DELETE FROM Commentaire WHERE ID = p_id;
    END DeleteCommentaire;

    -- Fonction pour récupérer les commentaires d'un article
    FUNCTION GetCommentaires(p_id_article INT) RETURN SYS_REFCURSOR IS
        -- Déclaration d'un curseur pour récupérer les commentaires
        v_cursor SYS_REFCURSOR;
    BEGIN
        -- Sélectionner les commentaires de l'article spécifié
        OPEN v_cursor FOR
        SELECT ID_user, note, commentaire
        FROM Commentaire
        WHERE ID_article = p_id_article;

        -- Retourner le curseur
        RETURN v_cursor;
    END GetCommentaires;

END CommentairePackages;

//
DELIMITER ;
