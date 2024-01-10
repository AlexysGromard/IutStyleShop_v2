DELIMITER //


CREATE OR REPLACE TRIGGER Vetement_check_id_i
AFTER INSERT ON Vetement
FOR EACH ROW
BEGIN
    DECLARE non_compliant_item INT;
    /* Quand un article est à la fois dans Vetement et dans Accessoire*/
    SELECT COUNT(*) INTO non_compliant_item FROM Article WHERE id in (SELECT id_Article from Vetement) and id in (SELECT id_Article from Accessoire);
    if non_compliant_item >0 THEN
            SIGNAL SQLSTATE '45206' SET MESSAGE_TEXT = 'Un article est à la fois dans Vetement et dans Accessoire';
    END IF;

    /* Quand un article n'est ni dans Vetement ni dans Accessoire*/
    SELECT COUNT(*) INTO non_compliant_item FROM Article WHERE id not in (SELECT id_Article from Vetement) and id not in (SELECT id_Article from Accessoire);
    if non_compliant_item >0 THEN
            SIGNAL SQLSTATE '45207' SET MESSAGE_TEXT = 'Un article n est ni dans Vetement ni dans Accessoire';
    END IF;

    /* Quand un article est dans Vetement mais pas dans Article*/
    SELECT COUNT(*) INTO non_compliant_item FROM Vetement WHERE id not in (SELECT id from Article);
    if non_compliant_item >0 THEN
            SIGNAL SQLSTATE '45208' SET MESSAGE_TEXT = 'Un article est dans Vetement mais pas dans Article';
    END IF;

    /* Quand un article est dans Accessoire mais pas dans Article*/
    SELECT COUNT(*) INTO non_compliant_item FROM Accessoire WHERE id not in (SELECT id from Article);
    if non_compliant_item >0 THEN
            SIGNAL SQLSTATE '45209' SET MESSAGE_TEXT = 'Un article est dans Accessoire mais pas dans Article';
    END IF;
END;


//
DELIMITER ;