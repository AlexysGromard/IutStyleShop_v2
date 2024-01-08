DELIMITER //
-- Check si il y a un admin dans la table user
CREATE OR REPLACE TRIGGER User_check_one_admin_i
BEFORE INSERT ON User
FOR EACH ROW
BEGIN

    DECLARE admin_count INT;

    SELECT COUNT(*) INTO admin_count FROM User WHERE admin = 1;
    IF admin_count = 0 THEN
        SIGNAL SQLSTATE '45050'
        SET MESSAGE_TEXT = 'Il doit y avoir au moins un admin dans la table User';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER User_check_one_admin_u
BEFORE UPDATE ON User
FOR EACH ROW
BEGIN

    DECLARE admin_count INT;
    
    SELECT COUNT(*) INTO admin_count FROM User WHERE admin = 1;
    IF admin_count = 0 THEN
        SIGNAL SQLSTATE '45050'
        SET MESSAGE_TEXT = 'Il doit y avoir au moins un admin dans la table User';
    END IF;
END;
//
CREATE OR REPLACE TRIGGER User_check_one_admin_d
BEFORE DELETE ON User
FOR EACH ROW
BEGIN

    DECLARE admin_count INT;

    SELECT COUNT(*) INTO admin_count FROM User WHERE admin = 1;
    IF admin_count = 0 THEN
        SIGNAL SQLSTATE '45050'
        SET MESSAGE_TEXT = 'Il doit y avoir au moins un admin dans la table User';
    END IF;
END;
//
DELIMITER ;