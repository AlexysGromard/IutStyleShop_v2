DELIMITER // 

-- procedure pour récupérer les commentaires d'un article
CREATE OR REPLACE PROCEDURE GetCommentaires(
    p_id_article INT
)  
BEGIN
    -- Sélectionner les commentaires de l'article spécifié
    
    SELECT *
    FROM Commentaire
    WHERE ID_article = p_id_article;

END //
DELIMITER ;