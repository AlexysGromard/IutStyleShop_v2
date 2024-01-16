DELIMITER //



-- Procédure pour supprimer une image
    CREATE OR REPLACE PROCEDURE DeleteArticle(
        p_id INT
    )
    BEGIN
        -- Logique pour supprimer une image de la table Image
        DELETE FROM Image WHERE ID_article = p_id;
        DELETE FROM Commentaire WHERE ID_Article = p_id;
        DELETE FROM Panier WHERE ID_Article = p_id;
        DELETE FROM Accessoire WHERE id_Article = p_id;
        DELETE FROM Vetement WHERE id_Article = p_id;
        DELETE FROM Article WHERE id = p_id;
    END //
DELIMITER ;