DELIMITER //
CREATE OR REPLACE  PROCEDURE GetCodePromoById(p_id INT)
BEGIN
    -- Logique pour récupérer les informations d'un code promo
    SELECT * FROM CodePromo WHERE id = p_id;
END //
DELIMITER ;