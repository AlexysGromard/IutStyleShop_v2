CREATE TRIGGER CodePromo_check_promo_range
BEFORE INSERT, UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45202' SET MESSAGE_TEXT = 'La promotion doit être comprise entre 0 et 100';
    END IF;
END;

