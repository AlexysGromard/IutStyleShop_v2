DELIMITER // 

-- Procédure pour supprimer un commentaire
CREATE OR REPLACE PROCEDURE DeleteCommentaire(
    p_id_user INT,
    p_id_article INT
    ) 
BEGIN
    -- Supprimer le commentaire de la table Commentaire
    DELETE FROM Commentaire WHERE ID_User = p_id_user AND ID_Article = p_id_article;
END //
DELIMITER ;