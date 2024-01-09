DELIMITER //

CREATE OR REPLACE  PROCEDURE GetAllCodePromo()
BEGIN
    -- Logique pour récupérer tous les codes promo
    SELECT * FROM CodePromo;
END GetAllCodePromo;
//
DELIMITER ;