DELIMITER //
CREATE OR REPLACE TRIGGER Commentaire_update_article_votants_i
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    DECLARE votants_count INT;

    SET votants_count = (
        SELECT COUNT(DISTINCT idUtilisateur)
        FROM Commentaire
        WHERE Commentaire.id_Article = NEW.id_Article
    );

    UPDATE Article
    SET votants = votants_count
    WHERE Article.id_Article = NEW.id_Article;
END;
//
CREATE OR REPLACE TRIGGER Commentaire_update_article_votants_d
AFTER DELETE ON Commentaire
FOR EACH ROW
BEGIN
    DECLARE votants_count INT;

    SET votants_count = (
        SELECT COUNT(DISTINCT idUtilisateur)
        FROM Commentaire
        WHERE Commentaire.id_Article = OLD.id_Article
    );

    UPDATE Article
    SET votants = votants_count
    WHERE Article.id_Article = OLD.id_Article;
END;
//
DELIMITER ;