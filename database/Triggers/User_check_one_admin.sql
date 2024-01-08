DELIMITER //
-- Check si il y a un admin dans la table user
CREATE OR REPLACE TRIGGER User_check_one_admin
BEFORE INSERT OR UPDATE OR DELETE ON User
FOR EACH ROW
DECLARE
    admin_count INT;
BEGIN
    SELECT COUNT(*) INTO admin_count FROM User WHERE admin = 1;
    IF admin_count = 0 THEN
        SIGNAL SQLSTATE '45050'
        SET MESSAGE_TEXT = 'Il doit y avoir au moins un admin dans la table User';
    END IF;
END;
//
DELIMITER ;