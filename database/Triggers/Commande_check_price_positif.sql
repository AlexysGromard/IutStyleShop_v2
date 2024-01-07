
CREATE TRIGGER  Commande_check_price_positif
BEFORE INSERT, UPDATE ON  Commande
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45100'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END;