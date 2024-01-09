DELIMITER //
CREATE OR REPLACE PROCEDURE UpdateCodePromo(
    p_id INT,
    p_texte VARCHAR2,
    p_promo TINYINT
)
BEGIN
    -- Logique pour mettre à jour un code promo dans la table CodePromo
    UPDATE CodePromo
    SET texte = p_texte, promo = p_promo
    WHERE id = p_id;
END UpdateCodePromo;
//
DELIMITER ;
