DELIMITER //
-- Procédure pour supprimer un article du panier 
CREATE OR REPLACE PROCEDURE DeleteArticlePanier(
    p_iduser INT,
    p_idArticle INT
)
BEGIN
    -- Supprimer un article du panier
    DELETE FROM Panier WHERE ID_Utilisateur = p_iduser AND ID = p_idArticle;
END //
DELIMITER ;