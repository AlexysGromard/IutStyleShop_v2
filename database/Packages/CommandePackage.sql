DELIMITER //
CREATE OR REPLACE PACKAGE CommandePackage


    -- Procédure pour ajouter une nouvelle commande
    PROCEDURE InsertCommande(p_id_user INT, p_id_CodePromo INT );

    -- Procédure pour supprimer une commande
    PROCEDURE DeleteCommande(p_id INT);

    -- Procédure pour update le statut d'une commandes
    PROCEDURE UpdateStatutCommande(p_id INT, p_statut VARCHAR(64));

    -- PROCEDURE pour récupérer les commandes d'un utilisateur
    PROCEDURE GetCommandes(p_id_user INT)

    -- Procédure pour récupérer tous les articles de commande
    PROCEDURE GetArticleCommande(p_id_commande INT);

    -- Procédure pour récupérer toutes les commandes
    PROCEDURE GetAllCommandes();

    -- Procédure pour récupérer tous les articles de commande
    PROCEDURE GetALLArticlesCommandes();



END CommandePackage;
//

CREATE OR REPLACE PACKAGE BODY CommandePackage

    -- Procédure pour ajouter une nouvelle commande
    PROCEDURE InsertCommande(
        p_id_user INT,
        p_id_CodePromo INT
    )
    BEGIN
        -- Déclaration d'une variable pour le prix total de la commande
        v_prix_total FLOAT;
        -- Déclaration d'une variable pour la promotion globale
        -- COALESCE permet de remplacer une valeur NULL par une valeur par défaut
        promoglobale FLOAT =  COALESCE((SELECT promo FROM CodePromo WHERE ID = p_id_CodePromo), 0.0);


        -- Ajouter une nouvelle commande à la table Commande
        INSERT INTO Commande (ID_user,statut )
        VALUES (p_id_user,'en cours');
        -- Boucle qui insert tous les articles du panier dans la table ArticleCommande
        FOR i IN (SELECT ID_article, taille, quantite FROM Panier WHERE ID_user = p_id_user) LOOP
            INSERT INTO ArticleCommande (ID_commande, ID_article, taille ,prix_unitaire, quantite)
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
    PROCEDURE DeleteCommande(p_id INT)
    BEGIN
        -- Supprimer la commande de la table Commande
        DELETE FROM Commande WHERE ID = p_id;
        DELETE FROM ArticleCommande WHERE ID_commande = p_id;
    END DeleteCommande;

    -- Procédure pour update le statut d'une commande
    PROCEDURE UpdateStatutCommande(p_id INT, p_statut VARCHAR(64))
    BEGIN
        -- Supprimer la commande de la table Commande
        UPDATE Commande SET statut = p_statut WHERE ID = p_id;
    END UpdateStatutCommande;

    -- Fonction pour récupérer les commandes d'un utilisateur
    PROCEDURE GetCommandes(p_id_user INT)
    BEGIN
        -- Sélectionner toutes les commandes
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande
        WHERE ID_user = p_id_user;
    END 

    -- Procédure pour récupérer toutes les commandes
    PROCEDURE GetArticleCommande(p_id_commande INT)
    BEGIN
        -- Sélectionner tous les articles de commande
        SELECT ca.ID_commande, ca.ID_article, ca.taille, ca.prix_unitaire, ca.quantite
        FROM ArticleCommande ca
        WHERE ca.ID_commande = p_id_commande;
    END GetArticleCommande;


    PROCEDURE GetAllCommandes()
    BEGIN
        -- Sélectionner toutes les commandes
        SELECT ID, ID_user, date_commande, prix_total
        FROM Commande;
    END GetAllCommandes;

    PROCEDURE GetALLArticlesCommandes()
    BEGIN
        -- Sélectionner tous les articles de commande
        SELECT ca.ID_commande, ca.ID_article, ca.taille, ca.prix_unitaire, ca.quantite
        FROM ArticleCommande ca;
    END GetALLArticlesCommandes;

END CommandePackage;
//
DELIMITER;