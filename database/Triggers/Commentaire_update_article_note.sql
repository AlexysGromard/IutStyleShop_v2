DELIMITER //
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_i
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET note = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.id_Article = NEW.id_Article
    )
    WHERE Article.id_Article = NEW.id_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_u
AFTER UPDATE ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET Article.notes = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.id_Article = NEW.id_Article
    )
    WHERE Article.id_Article = NEW.id_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_d
AFTER DELETE ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET note = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.id_Article = OLD.id_Article
    )
    WHERE Article.id_Article = OLD.id_Article;
END;
//
DELIMITER ;