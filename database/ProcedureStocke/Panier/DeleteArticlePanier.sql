DELIMITER //
-- Procédure pour supprimer un article du panier 
CREATE OR REPLACE PROCEDURE DeleteArticlePanier(
    p_iduser INT,
    p_idArticle INT
)
BEGIN
    -- Supprimer un article du panier
    DELETE FROM Panier WHERE ID_User = p_iduser AND id_Article = p_idArticle;
END //
DELIMITER ;