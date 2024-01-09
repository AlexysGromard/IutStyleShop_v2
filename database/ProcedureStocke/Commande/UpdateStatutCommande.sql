DELIMITER //

CREATE OR REPLACE  PROCEDURE UpdateStatutCommande(
    p_id INT,
    p_statut VARCHAR(255)
)
BEGIN
    -- mettre à jour un statut de commande dans la table Commande
    UPDATE Commande
    SET statut = p_statut
    WHERE id = p_id;
END //