DELIMITER //
-- Procédure pour modifier un article du panier
CREATE OR REPLACE PROCEDURE UpdateArticlePanier(
    p_id INT,
    p_id_utilisateur INT,
    p_taille VARCHAR(4),
    p_quantite INT
)
BEGIN
    -- update un article du panier
    update Panier set taille = p_taille, quantite = p_quantite
    where ID_Article=p_id and ID_User=p_id_utilisateur;
END //
DELIMITER ;