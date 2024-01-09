DELIMITER //



-- Procédure pour supprimer une image
    CREATE OR REPLACE PROCEDURE DeleteImage(
        p_id INT
    )
    BEGIN
        -- Logique pour supprimer une image de la table Image
        DELETE FROM Image WHERE ID_article = p_id;
    END //
DELIMITER ;