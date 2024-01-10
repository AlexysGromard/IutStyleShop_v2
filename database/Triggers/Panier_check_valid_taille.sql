DELIMITER //
CREATE OR REPLACE TRIGGER Panier_check_valid_taille_i
BEFORE INSERT ON Panier
FOR EACH ROW
BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45401'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER Panier_check_valid_taille_u
BEFORE UPDATE ON Panier
FOR EACH ROW
BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45401'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END;
//
DELIMITER ;