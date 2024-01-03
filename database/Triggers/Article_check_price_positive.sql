CREATE TRIGGER Article_check_price_positive
BEFORE INSERT, UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45203'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END;

