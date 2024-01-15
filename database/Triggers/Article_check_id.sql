-- DELIMITER //

-- //
CREATE OR REPLACE TRIGGER Article_number_id_d
BEFORE INSERT ON Vetement
FOR EACH ROW
BEGIN
    --Variable
    DECLARE nombre_vetement INT;
    DECLARE nombre_accessoire INT;
    DECLARE nombre_article INT;

    SELECT COUNT(*) INTO nombre_vetement FROM Vetement ;
    SELECT COUNT(*) INTO nombre_vetement FROM Accessoire ;

    SELECT count(*) INTO nombre_article FROM Article;

    IF nombre_article != nombre_accessoire + nombre_vetement THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;


    IF EXISTS (SELECT id FROM Article WHERE id = NEW.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;  


    IF NOT EXISTS (SELECT id FROM Accessoire WHERE id = NEW.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;  
END //



CREATE OR REPLACE TRIGGER Article_number_id_d
BEFORE INSERT ON Accessoire
FOR EACH ROW
BEGIN
    --Variable
    DECLARE nombre_vetement INT;
    DECLARE nombre_accessoire INT;
    DECLARE nombre_article INT;

    SELECT COUNT(*) INTO nombre_vetement FROM Vetement ;
    SELECT COUNT(*) INTO nombre_vetement FROM Accessoire ;

    SELECT count(*) INTO nombre_article FROM Article;

    IF nombre_article != nombre_accessoire + nombre_vetement THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;


    IF EXISTS (SELECT id FROM Article WHERE id = NEW.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;  


    IF NOT EXISTS (SELECT id FROM Vetement WHERE id = NEW.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;  
END //



CREATE OR REPLACE TRIGGER Article_number_id_d
BEFORE DELETE ON Vetement
FOR EACH ROW
BEGIN
    -- Variables
    DECLARE nombre_vetement INT;
    DECLARE nombre_accessoire INT;
    DECLARE nombre_article INT;

    SELECT COUNT(*) INTO nombre_vetement FROM Vetement ;
    SELECT COUNT(*) INTO nombre_accessoire FROM Accessoire ;

    SELECT COUNT(*) INTO nombre_article FROM Article;

    IF nombre_article != nombre_accessoire + nombre_vetement THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;

    IF EXISTS (SELECT id FROM Article WHERE id = OLD.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;

    IF NOT EXISTS (SELECT id FROM Accessoire WHERE id = OLD.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;
END //


CREATE OR REPLACE TRIGGER Article_number_id_d
BEFORE DELETE ON Accessoire
FOR EACH ROW
BEGIN
    -- Variables
    DECLARE nombre_vetement INT;
    DECLARE nombre_accessoire INT;
    DECLARE nombre_article INT;

    SELECT COUNT(*) INTO nombre_vetement FROM Vetement ;
    SELECT COUNT(*) INTO nombre_accessoire FROM Accessoire ;

    SELECT COUNT(*) INTO nombre_article FROM Article;

    IF nombre_article != nombre_accessoire + nombre_vetement THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;

    IF EXISTS (SELECT id FROM Article WHERE id = OLD.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;

    IF NOT EXISTS (SELECT id FROM Vetement WHERE id = OLD.id) THEN 
        SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;
END //





DELIMITER ;



--     DECLARE non_compliant_item INT;
--     /* Quand un article est à la fois dans Vetement et dans Accessoire*/
--     SELECT COUNT(*) INTO non_compliant_item FROM Article WHERE id in (SELECT id_Article from Vetement) and id in (SELECT id_Article from Accessoire);
--     if non_compliant_item >0 THEN
--             SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
--     END IF;

--     /* Quand un article n'est ni dans Vetement ni dans Accessoire*/
--     SELECT COUNT(*) INTO non_compliant_item FROM Article WHERE id not in (SELECT id_Article from Vetement) and id not in (SELECT id_Article from Accessoire);
--     if non_compliant_item >0 THEN
--             SIGNAL SQLSTATE '45207' SET MESSAGE_TEXT = 'Un article n est ni dans Vetement ni dans Accessoire';
--     END IF;

--     /* Quand un article est dans Vetement mais pas dans Article*/
--     SELECT COUNT(*) INTO non_compliant_item FROM Vetement WHERE id not in (SELECT id from Article);
--     if non_compliant_item >0 THEN
--             SIGNAL SQLSTATE '45208' SET MESSAGE_TEXT = 'Un article est dans Vetement mais pas dans Article';
--     END IF;

--     /* Quand un article est dans Accessoire mais pas dans Article*/
--     SELECT COUNT(*) INTO non_compliant_item FROM Accessoire WHERE id not in (SELECT id from Article);
--     if non_compliant_item >0 THEN
--             SIGNAL SQLSTATE '45209' SET MESSAGE_TEXT = 'Un article est dans Accessoire mais pas dans Article';
--     END IF;
-- END;
-- //
-- DELIMITER ;



-- Article id = acces id + vet id
-- acces id IN Article id 
-- vet id IN Article id 
-- vet id NOT IN acces id