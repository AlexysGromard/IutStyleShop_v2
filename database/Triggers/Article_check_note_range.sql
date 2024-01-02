
CREATE TRIGGER before_insert_update_Article
BEFORE INSERT, UPDATE ON Article
FOR EACH ROW
BEGIN

    IF NEW.note > 5.00 THEN
        SIGNAL SQLSTATE '45200' SET MESSAGE_TEXT = 'La note ne peut pas dépasser 5.00';
    END IF;

    IF NEW.note < 0.00 THEN
        SIGNAL SQLSTATE '45201' SET MESSAGE_TEXT = 'La note ne peut pas être inférieure à 0.00';
    END IF;
END;
