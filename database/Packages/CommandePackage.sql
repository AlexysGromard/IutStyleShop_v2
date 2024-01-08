SET sql_mode=ORACLE;
DELIMITER //
CREATE OR REPLACE PACKAGE CommandePackage AS

    -- Procédure pour ajouter une nouvelle commande
    PROCEDURE InsertCommande(
        p_id_user INT,
        p_id_CodePromo INT
    );

    -- Procédure pour supprimer une commande
    PROCEDURE DeleteCommande(p_id INT);

    -- Procédure pour update le statut d'une commandes
    PROCEDURE UpdateCommande(p_id INT, p_statut VARCHAR2);

    -- PROCEDURE pour récupérer les commandes d'un utilisateur
    PROCEDURE GetCommandes(p_id_user INT, OUT p_commande CURSOR, OUT p_articlecommande CURSOR);

    -- Procédure pour récupérer toutes les commandes
        PROCEDURE GetAllCommandes(OUT p_commande CURSOR, OUT p_articlecommande CURSOR);


END CommandePackage;
//

CREATE OR REPLACE PACKAGE BODY CommandePackage AS

    -- Procédure pour ajouter une nouvelle commande
    PROCEDURE InsertCommande(
        p_id_user INT,
        p_id_CodePromo INT
    ) IS
    BEGIN
        -- Déclaration d'une variable pour le prix total de la commande
        v_prix_total FLOAT;
        -- Déclaration d'une variable pour la promotion globale
        -- COALESCE permet de remplacer une valeur NULL par une valeur par défaut
        promoglobale FLOAT =  COALESCE((SELECT promo FROM CodePromo WHERE ID = p_id_CodePromo), 0.0);


        -- Ajouter une nouvelle commande à la table Commande
        INSERT INTO Commande (ID_user,statut )
        VALUES (p_id_user,'en cours');
        -- Boucle qui insert tous les articles du panier dans la table CommandeArticle
        FOR i IN (SELECT ID_article, taille, quantite FROM Panier WHERE ID_user = p_id_user) LOOP
            INSERT INTO CommandeArticle (ID_commande, ID_article, taille ,prix_unitaire, quantite)
            VALUES ((SELECT MAX(ID) FROM Commande), i.ID_article, i.taille, SELECT prix * (1 - promo) * (1 - promoglobale) FROM Article WHERE ID = i.ID_article ,i.quantite);
            -- Calculer le prix total de la commande
            v_prix_total := v_prix_total + (SELECT prix * (1 - promo) * (1 - promoglobale) FROM Article WHERE ID = i.ID_article) * i.quantite;
        END LOOP;
        -- Mettre à jour le prix total de la commande
        UPDATE Commande SET prix_total = v_prix_total WHERE ID = (SELECT MAX(ID) FROM Commande);

        -- Supprimer tous les articles du panier
        DELETE FROM Panier WHERE ID_user = p_id_user;


    END InsertCommande;

    -- Procédure pour supprimer une commande
    PROCEDURE DeleteCommande(p_id INT) IS
    BEGIN
        -- Supprimer la commande de la table Commande
        DELETE FROM Commande WHERE ID = p_id;
        DELETE FROM CommandeArticle WHERE ID_commande = p_id;
    END DeleteCommande;

    -- Procédure pour update le statut d'une commande
    PROCEDURE UpdateCommande(p_id INT, p_statut VARCHAR2) IS
    BEGIN
        -- Supprimer la commande de la table Commande
        UPDATE Commande SET statut = p_statut WHERE ID = p_id;
    END UpdateCommande;

    -- Fonction pour récupérer les commandes d'un utilisateur
    PROCEDURE PROCEDURE GetCommandes(p_id_user INT, OUT p_commande CURSOR, OUT p_articlecommande CURSOR) IS
    BEGIN
        -- Sélectionner les commandes de l'utilisateur spécifié
        OPEN p_commande FOR
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande
        WHERE ID_user = p_id_user;

        -- Sélectionner les articles de la commande pour l'utilisateur spécifié
        OPEN p_articlecommande FOR
        SELECT ca.ID_commande, ca.ID_article, ca.taille, ca.prix_unitaire, ca.quantite
        FROM CommandeArticle ca
        INNER JOIN Commande c ON c.ID_commande = ca.ID_commande
        WHERE c.ID_user = p_id_user;
        

    END GetCommandes;

    PROCEDURE GetAllCommandes(OUT p_commande CURSOR, OUT p_articlecommande CURSOR) IS
    BEGIN
        -- Sélectionner toutes les commandes
        OPEN p_commande FOR
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande;

        -- Sélectionner tous les articles de commande
        OPEN p_articlecommande FOR
        SELECT ID_commande, ID_article, taille, prix_unitaire, quantite
        FROM CommandeArticle;

    END GetAllCommandes;

END CommandePackage;
//
DELIMITER;