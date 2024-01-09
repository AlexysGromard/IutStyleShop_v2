

--Table User
CREATE OR REPLACE TABLE User (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	email VARCHAR(255) NOT NULL UNIQUE,
	telephone VARCHAR(10) DEFAULT NULL UNIQUE,
	password VARCHAR(255) NOT NULL, -- crypter avec bcrypt
	nom VARCHAR(64) DEFAULT NULL,
	prenom  VARCHAR(64) DEFAULT NULL,
	genre VARCHAR(16) DEFAULT NULL,
	role VARCHAR(16) NOT NULL,
	adresse VARCHAR(255) DEFAULT NULL,
	ville VARCHAR(128) DEFAULT NULL,
	code_postal MEDIUMINT DEFAULT NULL,
	Complement_adresse VARCHAR(128) DEFAULT NULL
);

INSERT INTO User (email, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
VALUES ('admin@iutstyleshop.com', 'admin', NULL, NULL, NULL, 'admin',NULL, NULL, NULL , NULL);
