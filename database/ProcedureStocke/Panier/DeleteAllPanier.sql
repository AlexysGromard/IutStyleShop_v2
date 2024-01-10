DELIMITER //

CREATE OR REPLACE  PROCEDURE DeleteAllPanier(
    p_iduser INT
)
BEGIN
    -- Supprimer tous les articles du panier
    DELETE FROM Panier WHERE ID_Utilisateur = p_iduser;
END //
DELIMITER ;