DELIMITER //



-- Procédure pour supprimer une image
    CREATE OR REPLACE PROCEDURE GetAllArticle()
    BEGIN
        SELECT * FROM Article;
    END //
DELIMITER ;