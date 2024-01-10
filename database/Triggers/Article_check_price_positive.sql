DELIMITER //
CREATE OR REPLACE TRIGGER Article_check_price_positive_i
BEFORE INSERT ON Article
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45203'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER Article_check_price_positive_u
BEFORE UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45203'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END;
//
DELIMITER ;