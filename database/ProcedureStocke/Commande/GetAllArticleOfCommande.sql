DELIMITER //

CREATE OR REPLACE  PROCEDURE GetAllArticleOfCommande
(
    p_idcommande INT
)
BEGIN
    -- Sortir les informations d'une commande
    SELECT * FROM ArticleCommande WHERE id_commande = p_idcommande;
END //
DELIMITER ;