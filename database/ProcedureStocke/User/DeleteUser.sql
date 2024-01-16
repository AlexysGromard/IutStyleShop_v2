DELIMITER //

-- Procédure pour supprimer un utilisateur
CREATE OR REPLACE PROCEDURE DeleteUser(
    p_id INT
    )
    BEGIN
    IF p_id != 1 THEN
        -- Logique pour supprimer un utilisateur de la table User
        DELETE FROM ArticleCommande WHERE id_commande IN (SELECT id FROM Commande WHERE ID_User = p_id);
        DELETE FROM Commande WHERE ID_User = p_id;
        DELETE FROM Panier WHERE ID_User = p_id;
        DELETE FROM Commentaire WHERE ID_User = p_id;
        DELETE FROM User WHERE id = p_id;
    END IF;
        
        
    END //
DELIMITER ;