DELIMITER //



-- Procédure pour donner tout les articles
    CREATE OR REPLACE PROCEDURE GetAllArticle()
    BEGIN
        SELECT * FROM Article;
    END //
DELIMITER ;