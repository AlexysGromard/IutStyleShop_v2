DELIMITER //
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_i
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article
    SET Article.notes = (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.id_Article = NEW.id_Article
    )
    WHERE Article.id = NEW.id_Article;
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
    WHERE Article.id = NEW.id_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_note_d
AFTER DELETE ON Commentaire
FOR EACH ROW
BEGIN
UPDATE Article
    SET Article.notes = 0.0
    WHERE Article.id = OLD.id_Article and null in (
        SELECT AVG(Commentaire.note)
        FROM Commentaire
        WHERE Commentaire.id_Article = OLD.id_Article
    );
    --TODO
    -- UPDATE Article
    -- SET Article.notes = (
    --     SELECT AVG(Commentaire.note)
    --     FROM Commentaire
    --     WHERE Commentaire.id_Article = OLD.id_Article
    -- )
    -- WHERE Article.id = OLD.id_Article;
END;
//
DELIMITER ;