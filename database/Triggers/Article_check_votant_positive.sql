DELIMITER //
CREATE TRIGGER Article_check_votant_positive
BEFORE INSERT, UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45204'
        SET MESSAGE_TEXT = 'Les votant ne peuvent pas être négatif';
    END IF;
END;
//
DELIMITER ;