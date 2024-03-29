DELIMITER //
-- Procédure pour récupérer les informations d'un article
    CREATE OR REPLACE PROCEDURE GetAccessoireOrVetement(p_id INT)
    BEGIN
        
        IF (SELECT category FROM Article WHERE id = p_id) = 'accessoire' THEN
            SELECT * FROM Accessoire WHERE ID_article = p_id ;
        ELSE
            SELECT * FROM Vetement WHERE ID_article = p_id;
        END IF;
    END //
DELIMITER ;