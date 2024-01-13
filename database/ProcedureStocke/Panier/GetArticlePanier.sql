DELIMITER //
-- Procédure pour sortir les informations d'un article du panier d'un utilisateur
CREATE OR REPLACE PROCEDURE GetArticlePanier(
    p_iduser INT
)
BEGIN
    SELECT * FROM Panier WHERE ID_User = p_iduser;
END //
DELIMITER ;