DELIMITER //
CREATE TRIGGER check_vetement_quantities
BEFORE INSERT, UPDATE ON Vetement
FOR EACH ROW
BEGIN
    IF NEW.quantiteXS < 0 OR NEW.quantiteS < 0 OR NEW.quantiteM < 0 OR NEW.quantiteL < 0 OR NEW.quantiteXL < 0 THEN
        SIGNAL SQLSTATE '45300'
        SET MESSAGE_TEXT = 'Les quantités ne peuvent pas être négatives pour les tailles XS, S, M, L, XL';
    END IF;
END;
//
DELIMITER ;