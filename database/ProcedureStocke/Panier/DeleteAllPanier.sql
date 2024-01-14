DELIMITER //
-- Procédure pour supprimer tous les articles du panier d'un utilisateur
CREATE OR REPLACE  PROCEDURE DeleteAllPanier(
    p_iduser INT
)
BEGIN
    -- Supprimer tous les articles du panier
    DELETE FROM Panier WHERE ID_Utilisateur = p_iduser;
END //
DELIMITER ;