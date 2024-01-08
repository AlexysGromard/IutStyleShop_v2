DELIMITER //
-- Verifie que dans la table user, un utilisateur ne peut avoir que deux roles (admin et client)
CREATE OR REPLACE TRIGGER User_check_two_role
BEFORE INSERT OR UPDATE ON User
FOR EACH ROW
BEGIN
IF (NEW.role  NOT IN ('admin', 'client')) THEN
        SIGNAL SQLSTATE '45051'
        SET MESSAGE_TEXT = 'Un utilisateur ne peut avoir que un des deux roles (admin et client)';
    END IF;
END IF;
END;
//
DELIMITER ;