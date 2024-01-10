DELIMITER //
CREATE OR REPLACE TRIGGER check_quantity_positive_i
BEFORE INSERT ON Accessoire
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45250'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END;//

CREATE OR REPLACE TRIGGER check_quantity_positive_u
BEFORE UPDATE ON Accessoire
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45250'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END;//
DELIMITER ;+
