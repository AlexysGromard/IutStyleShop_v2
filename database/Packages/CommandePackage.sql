
CREATE OR REPLACE PACKAGE CommandePackage AS

    -- Procédure pour ajouter une nouvelle commande
    PROCEDURE InsertCommande(
        p_id_user INT,
        p_id_CodePromo INT
    );

    -- Procédure pour supprimer une commande
    PROCEDURE DeleteCommande(p_id INT);

    PROCEDURE UpdateCommande(p_id INT, p_statut VARCHAR2);

    -- Fonction pour récupérer les commandes d'un utilisateur
    FUNCTION GetCommandes(p_id_user INT) RETURN SYS_REFCURSOR , SYS_REFCURSOR;

    FUNCTION GetAllCommandes() RETURN SYS_REFCURSOR , SYS_REFCURSOR;

END CommandePackage;


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
    FUNCTION GetCommandes(p_id_user INT) RETURN SYS_REFCURSOR IS
        -- Déclaration d'un curseur pour récupérer les commandes
        v_cursor SYS_REFCURSOR;
        v_cursor2 SYS_REFCURSOR;
    BEGIN
        -- Sélectionner les commandes de l'utilisateur spécifié
        OPEN v_cursor FOR
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande
        WHERE ID_user = p_id_user;

        -- Sélectionner les articles de la commande
        OPEN v_cursor2 FOR
        SELECT ID_commande, ID_article, taille, prix_unitaire, quantite
        FROM CommandeArticle
        WHERE ID_commande = p_id_user;




        -- Retourner le curseur
        RETURN v_cursor, v_cursor2;
    END GetCommandes;

    FUNCTION GetAllCommandes() RETURN SYS_REFCURSOR IS
        -- Déclaration d'un curseur pour récupérer les commandes
        v_cursor SYS_REFCURSOR, v_cursor2 SYS_REFCURSOR;
    BEGIN
        -- Sélectionner les commandes de l'utilisateur spécifié
        OPEN v_cursor FOR
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande;

        -- Sélectionner les articles de la commande
        OPEN v_cursor2 FOR
        SELECT ID_commande, ID_article, taille, prix_unitaire, quantite
        FROM CommandeArticle;


        -- Retourner le curseur
        RETURN v_cursor, v_cursor2;
    END GetAllCommandes;

END CommandePackage;