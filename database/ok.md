--------------------------------------+--------+-----------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------+------------------------+-------------------------------------------------------------------------------------------+-----------------+----------------------+----------------------+--------------------+
| Trigger                              | Event  | Table           | Statement                                                                                                                                                                                                                                                                               | Timing | Created                | sql_mode                                                                                  | Definer         | character_set_client | collation_connection | Database Collation |
+--------------------------------------+--------+-----------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------+------------------------+-------------------------------------------------------------------------------------------+-----------------+----------------------+----------------------+--------------------+
| check_quantity_positive              | INSERT | Accessoire      | BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45250'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END                                                                                                                                  | BEFORE | 2024-01-08 13:32:10.08 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| check_quantity_positive_i            | INSERT | Accessoire      | BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45250'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END                                                                                                                                  | BEFORE | 2024-01-08 13:53:48.79 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| check_quantity_positive_u            | UPDATE | Accessoire      | BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45250'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END                                                                                                                                  | BEFORE | 2024-01-08 13:53:48.80 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_price_positive_i       | INSERT | Article         | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45203'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END                                                                                                                                           | BEFORE | 2024-01-08 13:53:48.77 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| CodePromo_check_promo_range_i        | INSERT | Article         | BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45202' SET MESSAGE_TEXT = 'La promotion doit être comprise entre 0 et 100';
    END IF;
END                                                                                                                 | BEFORE | 2024-01-08 13:53:48.85 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_votant_positive_i      | INSERT | Article         | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45204'
        SET MESSAGE_TEXT = 'Les votant ne peuvent pas être négatif';
    END IF;
END                                                                                                                                     | BEFORE | 2024-01-08 13:53:48.88 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_promo_range_i          | INSERT | Article         | BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45202' SET MESSAGE_TEXT = 'La promotion doit être comprise entre 0 et 100';
    END IF;
END                                                                                                                 | BEFORE | 2024-01-08 13:53:48.89 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_price_positive_u       | UPDATE | Article         | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45203'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END                                                                                                                                           | BEFORE | 2024-01-08 13:53:48.78 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| CodePromo_check_promo_range_u        | UPDATE | Article         | BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45202' SET MESSAGE_TEXT = 'La promotion doit être comprise entre 0 et 100';
    END IF;
END                                                                                                                 | BEFORE | 2024-01-08 13:53:48.86 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_votant_positive_u      | UPDATE | Article         | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45204'
        SET MESSAGE_TEXT = 'Les votant ne peuvent pas être négatif';
    END IF;
END                                                                                                                                     | BEFORE | 2024-01-08 13:53:48.88 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Article_check_promo_range_u          | UPDATE | Article         | BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45202' SET MESSAGE_TEXT = 'La promotion doit être comprise entre 0 et 100';
    END IF;
END                                                                                                                 | BEFORE | 2024-01-08 13:53:48.90 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| ArticleCommande_check_valid_taille_i | INSERT | ArticleCommande | BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45151'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END                                           | BEFORE | 2024-01-08 13:53:48.76 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Ticket_check_quantite_range_i        | INSERT | ArticleCommande | BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45151' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END                                                                                                            | BEFORE | 2024-01-08 13:53:48.94 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| ArticleCommande_check_valid_taille_u | UPDATE | ArticleCommande | BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45151'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END                                           | BEFORE | 2024-01-08 13:53:48.76 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Ticket_check_quantite_range_u        | UPDATE | ArticleCommande | BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45151' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END                                                                                                            | BEFORE | 2024-01-08 13:53:48.95 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Commande_check_price_positif_i       | INSERT | Commande        | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45100'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END                                                                                                                                           | BEFORE | 2024-01-08 13:53:48.91 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Commande_check_price_positif_u       | UPDATE | Commande        | BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45100'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END                                                                                                                                           | BEFORE | 2024-01-08 13:53:48.92 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Panier_check_valid_taille_i          | INSERT | Panier          | BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45401'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END                                           | BEFORE | 2024-01-08 13:53:48.82 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Panier_check_quantite_range_i        | INSERT | Panier          | BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45400' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END                                                                                                            | BEFORE | 2024-01-08 13:53:48.84 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Panier_check_valid_taille_u          | UPDATE | Panier          | BEGIN
    IF NEW.taille IS NOT NULL AND NOT (NEW.taille IN ('XS', 'S', 'M', 'L', 'XL')) THEN
        SIGNAL SQLSTATE '45401'
        SET MESSAGE_TEXT = 'La valeur de la colonne "taille" doit être XS, S, M, L, XL ou NULL';
    END IF;
END                                           | BEFORE | 2024-01-08 13:53:48.83 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| Panier_check_quantite_range_u        | UPDATE | Panier          | BEGIN
    IF NEW.quantite < 0 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45400' SET MESSAGE_TEXT = 'La quantite doit être comprise entre 0 et 100';
    END IF;
END                                                                                                            | BEFORE | 2024-01-08 13:53:48.84 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| check_vetement_quantities_i          | INSERT | Vetement        | BEGIN
    IF NEW.quantiteXS < 0 OR NEW.quantiteS < 0 OR NEW.quantiteM < 0 OR NEW.quantiteL < 0 OR NEW.quantiteXL < 0 THEN
        SIGNAL SQLSTATE '45300'
        SET MESSAGE_TEXT = 'Les quantités ne peuvent pas être négatives pour les tailles XS, S, M, L, XL';
    END IF;
END    | BEFORE | 2024-01-08 13:53:48.93 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
| check_vetement_quantities_u          | UPDATE | Vetement        | BEGIN
    IF NEW.quantiteXS < 0 OR NEW.quantiteS < 0 OR NEW.quantiteM < 0 OR NEW.quantiteL < 0 OR NEW.quantiteXL < 0 THEN
        SIGNAL SQLSTATE '45300'
        SET MESSAGE_TEXT = 'Les quantités ne peuvent pas être négatives pour les tailles XS, S, M, L, XL';
    END IF;
END    | BEFORE | 2024-01-08 13:53:48.93 | STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION | admin@localhost | utf8mb3              | utf8mb3_general_ci   | utf8mb4_general_ci |
+--------------------------------------+--------+-----------------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+--------+------------------------+-------------------------------------------------------------------------------------------+-----------------+----------------------+----------------------+--------------------+
