DELIMITER //
-- Procédure pour ajouter un article au panier
CREATE OR REPLACE PROCEDURE InsertPanier(
    p_id INT,
    p_id_utilisateur INT,
    p_taille VARCHAR(4),
    p_quantite INT
)
BEGIN
    -- Ajouter un article au panier
    INSERT INTO Panier (ID_User, ID_Article, taille, quantite)
    VALUES (p_id, p_id_utilisateur, p_taille, p_quantite);
END //
DELIMITER ;