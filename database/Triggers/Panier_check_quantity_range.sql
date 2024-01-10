DELIMITER //
CREATE OR REPLACE TRIGGER Panier_check_quantite_range_i
BEFORE INSERT ON Panier
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45400' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER Panier_check_quantite_range_u
BEFORE UPDATE ON Panier
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45400' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END;
//
DELIMITER ;