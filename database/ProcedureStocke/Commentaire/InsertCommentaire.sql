DELIMITER // 

-- Procédure pour ajouter un nouveau commentaire
CREATE OR REPLACE PROCEDURE InsertCommentaire(
    p_id_user INT,
    p_id_article INT,
    p_note FLOAT,
    p_commentaire VARCHAR(512)
) 
BEGIN
    -- Ajouter un nouveau commentaire à la table Commentaire
    INSERT INTO Commentaire(ID_User, ID_Article, note, commentaire)
    VALUES (p_id_user, p_id_article, p_note, p_commentaire);
END //
DELIMITER ;
