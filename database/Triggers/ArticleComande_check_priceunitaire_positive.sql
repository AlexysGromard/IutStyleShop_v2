DELIMITER //
CREATE TRIGGER Ticket_check_priceunitaire_positive
BEFORE INSERT, UPDATE ON ArticleComande
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45152'
        SET MESSAGE_TEXT = 'Le prix unitaire ne peut pas être négative';
    END IF;
END;
//
DELIMITER ;