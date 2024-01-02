
CREATE TRIGGER update_article_note
AFTER INSERT, UPDATE, DELETE ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET note = (
        SELECT IFNULL(SUM(note), 0)
        FROM Commentaire
        WHERE Commentaire.idArticle = NEW.idArticle
    )
    WHERE Article.idArticle = NEW.idArticle;
END;
