DELIMITER //



-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE  PROCEDURE GetImageArticle(p_id INT)
    BEGIN
        SELECT * FROM Image WHERE id_Article = p_id;
        
    END //
DELIMITER ;