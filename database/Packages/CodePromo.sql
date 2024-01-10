DELIMITER //
CREATE OR REPLACE PACKAGE CodePromoPackage AS

    -- Procédure pour insérer un nouveau code promo
    PROCEDURE InsertCodePromo(
        p_texte VARCHAR2,
        p_promo TINYINT
    );

    -- Procédure pour mettre à jour un code promo existant
    PROCEDURE UpdateCodePromo(
        p_id INT,
        p_texte VARCHAR2,
        p_promo TINYINT
    );

    -- Procédure pour supprimer un code promo
    PROCEDURE DeleteCodePromo(p_id INT);

    -- Fonction pour récupérer les informations d'un code promo
    FUNCTION GetCodePromoInfo(p_id INT) RETURN SYS_REFCURSOR;

    FUNCTION GetCodePromoInfoAll() RETURN SYS_REFCURSOR;

END //

CREATE OR REPLACE PACKAGE BODY CodePromoPackage AS

    -- Procédure pour insérer un nouveau code promo
    PROCEDURE InsertCodePromo(
        p_texte VARCHAR2,
        p_promo TINYINT
    )
    BEGIN
        -- Logique pour insérer un nouveau code promo dans la table CodePromo
        INSERT INTO CodePromo (texte, promo) VALUES (p_texte, p_promo);
    END InsertCodePromo;

    -- Procédure pour mettre à jour un code promo existant
    PROCEDURE UpdateCodePromo(
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

    -- Procédure pour supprimer un code promo
    PROCEDURE DeleteCodePromo(p_id INT)
    BEGIN
        -- Logique pour supprimer un code promo de la table CodePromo
        DELETE FROM CodePromo WHERE id = p_id;
    END DeleteCodePromo;

    -- Fonction pour récupérer les informations d'un code promo
    FUNCTION GetCodePromoInfo(p_id INT) RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un code promo avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM CodePromo WHERE id = p_id;
        RETURN v_cursor;
    END GetCodePromoInfo;

    
    -- Fonction pour récupérer toutes les informations d'un code promo
    FUNCTION GetCodePromoInfoAll RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un code promo avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM CodePromo ;
        RETURN v_cursor;
    END GetCodePromoInfo;

END //

DELIMITER;