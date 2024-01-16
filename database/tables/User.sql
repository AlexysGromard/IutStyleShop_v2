

--Table User
CREATE OR REPLACE TABLE User (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    email VARCHAR(255) NOT NULL UNIQUE,
    telephone VARCHAR(10) DEFAULT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- crypté avec SHA2
    nom VARCHAR(64) DEFAULT NULL,
    prenom VARCHAR(64) DEFAULT NULL,
    genre VARCHAR(16) DEFAULT NULL,
    role VARCHAR(16) NOT NULL,
    adresse VARCHAR(255) DEFAULT NULL,
    ville VARCHAR(128) DEFAULT NULL,
    code_postal MEDIUMINT DEFAULT NULL,
    Complement_adresse VARCHAR(128) DEFAULT NULL
);


-- Insertion de l'utilisateur admin avec le mot de passe hashé
INSERT INTO User (email, telephone, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
VALUES ('admin@iutstyleshop.com', '0102030405', SHA2('admin', 256), 'admin', 'admin', 'N', 'admin', 'admin', 'admin', 0, 'admin');