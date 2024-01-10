DELIMITER //
CREATE OR REPLACE TRIGGER ArticleCommande_check_valid_taille_i
BEFORE INSERT ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45151'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER ArticleCommande_check_valid_taille_u
BEFORE UPDATE ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45151'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END;
//
DELIMITER ;