DELIMITER //
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_i
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET Article.notes = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.ID_Article = NEW.ID_Article
    )
    WHERE Article.id = NEW.ID_Article;
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
        WHERE Commentaire.ID_Article = NEW.ID_Article
    )
    WHERE Article.id = NEW.ID_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_d
AFTER DELETE ON Commentaire
FOR EACH ROW
BEGIN
UPDATE Article
    SET Article.notes = 0.0
    WHERE Article.id = OLD.ID_Article and null in (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.ID_Article = OLD.ID_Article
    );
    
    UPDATE Article
    SET Article.notes = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.ID_Article = OLD.ID_Article
    )
    WHERE Article.id = OLD.ID_Article and null not in (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.ID_Article = OLD.ID_Article
    );
END;
//
DELIMITER ;