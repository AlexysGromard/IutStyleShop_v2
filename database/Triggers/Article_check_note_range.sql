DELIMITER //
CREATE OR REPLACE TRIGGER Article_check_note_range_i
BEFORE INSERT ON Article
FOR EACH ROW
BEGIN
    IF NEW.notes > 5.00 THEN
        SIGNAL SQLSTATE '45200' SET MESSAGE_TEXT = 'La note ne peut pas dépasser 5.00';
    END IF;

    IF NEW.notes < 0.00 THEN
        SIGNAL SQLSTATE '45201' SET MESSAGE_TEXT = 'La note ne peut pas être inférieure à 0.00';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER Article_check_note_range_u
BEFORE UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.notes > 5.00 THEN
        SIGNAL SQLSTATE '45200' SET MESSAGE_TEXT = 'La note ne peut pas dépasser 5.00';
    END IF;

    IF NEW.notes < 0.00 THEN
        SIGNAL SQLSTATE '45201' SET MESSAGE_TEXT = 'La note ne peut pas être inférieure à 0.00';
    END IF;
END;
//
DELIMITER ;
