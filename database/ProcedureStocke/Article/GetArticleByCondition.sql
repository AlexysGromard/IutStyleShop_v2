DELIMITER //



-- Procédure pour récupérer les informations des  articles  par rapport a differentes condition
    CREATE OR REPLACE PROCEDURE `GetArticleByCondition`(
    p_couleur VARCHAR(32),
    p_categorie VARCHAR(128),
    p_prix_min FLOAT,
    p_prix_max FLOAT,
    p_genre VARCHAR(16),
    p_promo TINYINT(1),
    p_disponible BOOLEAN
)
BEGIN
    SET NAMES utf8mb4;

    SELECT * FROM Article 
    WHERE 
        couleur = p_couleur --  COLLATE utf8mb4_general_ci
        AND category = p_categorie -- COLLATE utf8mb4_general_ci
        AND prix >= p_prix_min 
        AND prix <= p_prix_max 
        AND (
            (genre = p_genre) --  COLLATE utf8mb4_general_ci) 
            OR (category NOT LIKE 'accessoire' AND p_genre LIKE 'MF') --  COLLATE utf8mb4_general_ci)
        )
        AND (
            (p_promo = 1 AND promo > 0) 
            OR (p_promo = 0 AND promo >= 0)
        ) 
        AND disponible = p_disponible;
END //
DELIMITER ;
