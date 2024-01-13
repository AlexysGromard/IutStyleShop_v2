DELIMITER //
-- Procédure pour donner tout les articles
CREATE OR REPLACE PROCEDURE GetAllArticlePanier()
BEGIN
    SELECT * FROM Panier;
END //
DELIMITER ;