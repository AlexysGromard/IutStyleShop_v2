DELIMITER //
CREATE OR REPLACE TRIGGER Commentaire_update_article_votants_i
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    DECLARE votant_count INT;

    SET votant_count = (
        SELECT COUNT(DISTINCT ID_User)
        FROM Commentaire
        WHERE Commentaire.ID_Article = NEW.ID_Article
    );

    UPDATE Article
    SET votant = votant_count
    WHERE Article.id = NEW.ID_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_votants_d
AFTER DELETE ON Commentaire
FOR EACH ROW
BEGIN

    DECLARE votant_count INT;

    SET votant_count = (
        SELECT COUNT(DISTINCT ID_User)
        FROM Commentaire
        WHERE Commentaire.ID_Article = OLD.ID_Article
    );

    UPDATE Article
    SET votant = votant_count
    WHERE Article.id = OLD.ID_Article;

END ;
//
DELIMITER ;