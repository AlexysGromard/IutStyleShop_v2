DELIMITER //
CREATE TRIGGER Commentaire_update_article_votants
AFTER INSERT, DELETE ON Commentaire
FOR EACH ROW
BEGIN
    DECLARE votants_count INT;

    SET votants_count = (
        SELECT COUNT(DISTINCT idUtilisateur)
        FROM Commentaire
        WHERE Commentaire.idArticle = NEW.idArticle
    );

    UPDATE Article
    SET votants = votants_count
    WHERE Article.idArticle = NEW.idArticle;
END;
//
DELIMITER ;