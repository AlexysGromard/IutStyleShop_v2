DELIMITER // 

-- procedure pour récupérer les commentaires d'un article
CREATE OR REPLACE PROCEDURE GetCommentairesByIds(
    p_id_user INT,
    p_id_article INT
)  
BEGIN
    -- Sélectionner les commentaires de l'article spécifié
    
    SELECT ID_User, note, commentaire
    FROM Commentaire
    WHERE ID_article = p_id_article and ID_User = p_id_user;

END //
DELIMITER ;