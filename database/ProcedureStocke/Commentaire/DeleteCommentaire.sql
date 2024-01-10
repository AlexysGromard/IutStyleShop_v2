DELIMITER // 

-- Procédure pour supprimer un commentaire
CREATE OR REPLACE PROCEDURE DeleteCommentaire(p_id INT) 
BEGIN
    -- Supprimer le commentaire de la table Commentaire
    DELETE FROM Commentaire WHERE ID = p_id;
END //
DELIMITER ;