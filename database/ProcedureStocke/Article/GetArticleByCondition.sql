DELIMITER //



-- Procédure pour récupérer les informations des  articles  par rapport a differentes condition
    CREATE OR REPLACE  PROCEDURE GetArticleByCondition(p_couleur VARCHAR(32), p_categorie VARCHAR(128),p_prix_min FLOAT,p_prix_max FLOAT,p_genre VARCHAR(16),p_promo TINYINT(1),p_disponible BOOLEAN)
    BEGIN
            SELECT * FROM Article WHERE couleur = p_couleur and category = p_categorie and prix >= p_prix_min and prix <= p_prix_max and ((genre=p_genre) or (category not like 'accessoire' and p_genre like 'MF') ) AND ( (p_promo = 1 AND promo > 0) OR (p_promo = 0 AND promo = 0) ) and disponible = p_disponible;
        
    END //
DELIMITER ;
