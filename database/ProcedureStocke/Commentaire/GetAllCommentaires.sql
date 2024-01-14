DELIMITER // 

-- procedure pour récupérer les commentaires d'un article
CREATE OR REPLACE PROCEDURE GetAllCommentaires()  
BEGIN
    -- Sélectionner les commentaires de l'article spécifié
    
    SELECT ID_User, note, commentaire
    FROM Commentaire;

END //
DELIMITER ;