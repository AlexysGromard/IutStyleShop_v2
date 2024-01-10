DELIMITER //
CREATE OR REPLACE TRIGGER Ticket_check_priceunitaire_positive_i
BEFORE INSERT ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45152'
        SET MESSAGE_TEXT = 'Le prix unitaire ne peut pas être négative';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER Ticket_check_priceunitaire_positive_u
BEFORE UPDATE ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45152'
        SET MESSAGE_TEXT = 'Le prix unitaire ne peut pas être négative';
    END IF;
END;
//
DELIMITER ;