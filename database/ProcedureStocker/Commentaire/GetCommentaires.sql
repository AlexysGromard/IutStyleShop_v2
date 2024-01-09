// DELIMITER

-- Fonction pour récupérer les commentaires d'un article
    CREATE OR REPLACE FUNCTION GetCommentaires(p_id_article INT) RETURN SYS_REFCURSOR IS
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
    END //
DELIMITER