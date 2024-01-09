DELIMITER //
CREATE OR REPLACE  PROCEDURE DeleteCodePromo(p_id INT)
BEGIN
    -- Logique pour supprimer un code promo de la table CodePromo
    DELETE FROM CodePromo WHERE id = p_id;
END //
DELIMITER ;