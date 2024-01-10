DELIMITER //
CREATE OR REPLACE PACKAGE UserPackage AS

    -- Procédure pour insérer un nouvel utilisateur qui est un client
    PROCEDURE InsertUserClient(
        p_email VARCHAR,
        p_password VARCHAR,
        p_nom VARCHAR,
        p_prenom VARCHAR,
        p_genre VARCHAR,
        p_address VARCHAR,
        p_ville VARCHAR,
        p_code_postal MEDIUMINT,
        p_complement_adresse VARCHAR
    );

    -- Procédure pour mettre à jour les informations d'un utilisateur
    PROCEDURE UpdateUser(
        p_email VARCHAR,
        p_nom VARCHAR,
        p_prenom VARCHAR,
        p_genre VARCHAR,
        p_address VARCHAR,
        p_ville VARCHAR,
        p_code_postal MEDIUMINT,
        p_complement_adresse VARCHAR
    );

    -- Update password
    PROCEDURE UpdatePassword(
        p_id INT,
        p_password VARCHAR
    );

    -- update role
    PROCEDURE UpdateRole(
        p_id INT,
        p_role VARCHAR
    );

    -- Procédure pour supprimer un utilisateur
    PROCEDURE DeleteUser(p_id INT);

    -- Fonction pour récupérer les informations d'un utilisateur
    FUNCTION GetUserInfo(p_id INT) RETURN SYS_REFCURSOR;

    FUNCTION GetUserInfoAll() RETURN SYS_REFCURSOR;

    FUNCTION GetUserId(p_email VARCHAR) RETURN INT;
    
    -- Fonction pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
    FUNCTION GetConnectedUser() RETURN SYS_REFCURSOR;




END UserPackage;
//

CREATE OR REPLACE PACKAGE BODY UserPackage AS

    -- Procédure pour insérer un nouvel utilisateur qui est un client
    PROCEDURE InsertUserClient(
        p_email VARCHAR,
        p_password VARCHAR,
        p_nom VARCHAR,
        p_prenom VARCHAR,
        p_genre VARCHAR,
        p_address VARCHAR,
        p_ville VARCHAR,
        p_code_postal MEDIUMINT,
        p_complement_adresse VARCHAR
    )
    BEGIN
        -- crypter le mot de passe avec BCRYPT
        crypter := BCRYPT(p_password); 


        -- Logique pour insérer un nouvel utilisateur dans la table User
        INSERT INTO User (email, password, nom, prenom, role, address, ville, code_postal, complement_adresse)
        VALUES (p_email, crypter, p_nom, p_prenom, p_genre, 'client', p_address, p_ville, p_code_postal, p_complement_adresse);
    END InsertUser;

    -- Procédure pour mettre à jour les informations d'un utilisateur
    PROCEDURE UpdateUser(
        p_id INT,
        p_email VARCHAR,
        p_password VARCHAR,
        p_nom VARCHAR,
        p_prenom VARCHAR,
        p_genre VARCHAR,
        p_address VARCHAR,
        p_ville VARCHAR,
        p_code_postal MEDIUMINT,
        p_complement_adresse VARCHAR
    )
    BEGIN
        -- Logique pour mettre à jour les informations d'un utilisateur dans la table User
        UPDATE User
        SET email = p_email, password = p_password, nom = p_nom, prenom = p_prenom
        , genre = p_genre, address = p_address, ville = p_ville, code_postal = p_code_postal
        , complement_adresse = p_complement_adresse
        WHERE id = p_id;
    END UpdateUser;

    -- Update password
    PROCEDURE UpdatePassword(
        p_id INT,
        p_password VARCHAR
    )
    BEGIN
        -- Logique pour mettre à jour le mot de passe d'un utilisateur dans la table User
        UPDATE User
        SET password = BCRYPT(p_password)
        WHERE id = p_id;
    END UpdatePassword;

    -- update role
    PROCEDURE UpdateRole(
        p_id INT,
        p_role VARCHAR
    )
    BEGIN
        -- Logique pour mettre à jour le role d'un utilisateur dans la table User
        UPDATE User
        SET role = p_role
        WHERE id = p_id;
    END UpdateRole;

    -- Procédure pour supprimer un utilisateur
    PROCEDURE DeleteUser(p_id INT)
    BEGIN
        -- Logique pour supprimer un utilisateur de la table User
        DELETE FROM User WHERE id = p_id;
    END DeleteUser;

    -- Fonction pour récupérer les informations d'un utilisateur
    FUNCTION GetUserInfo(p_id INT) RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User WHERE id = p_id;
        RETURN v_cursor;
    END GetUserInfo;

    FUNCTION GetUserInfoAll() RETURN SYS_REFCURSOR
        BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'ID spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User;
        RETURN v_cursor;
    END GetUserInfo;

    FUNCTION GetUserId(p_email VARCHAR) RETURN INT
    BEGIN
        -- Logique pour récupérer l'ID d'un utilisateur avec l'email spécifié
        DECLARE v_id INT;
        SELECT id INTO v_id FROM User WHERE email = p_email;
        RETURN v_id;
    END GetUserId;

    -- Fonction pour récupérer les informations d'un utilisateur par son email et si le mot de passe est correct
    FUNCTION GetConnectedUser() RETURN SYS_REFCURSOR
    BEGIN
        -- Logique pour récupérer les informations d'un utilisateur avec l'email spécifié
        DECLARE v_cursor SYS_REFCURSOR;
        OPEN v_cursor FOR SELECT * FROM User WHERE email = p_email AND password = BCRYPT(p_password);
        RETURN v_cursor;
    END GetConnectedUser;

END UserPackage;
//
DELIMITER;