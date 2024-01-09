DELIMITER //
CREATE OR REPLACE PROCEDURE InsertCodePromo(
    p_texte VARCHAR2,
    p_promo TINYINT
);
BEGIN
    -- Logique pour insérer un nouveau code promo dans la table CodePromo
    INSERT INTO CodePromo (texte, promo) VALUES (p_texte, p_promo);
END InsertCodePromo;
//
DELIMITER ;