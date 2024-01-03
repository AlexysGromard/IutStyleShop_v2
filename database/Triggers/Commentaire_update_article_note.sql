
CREATE TRIGGER Commentaire_update_article_note
AFTER INSERT, UPDATE, DELETE ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET note = (
        SELECT AVG(note)
        FROM Commentaire
        WHERE Commentaire.idArticle = NEW.idArticle
    )
    WHERE Article.idArticle = NEW.idArticle;
END;
