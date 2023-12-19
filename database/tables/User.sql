

--Table User
CREATE OR REPLACE TABLE User (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	email VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL, -- crypter avec bcrypt
	nom VARCHAR(64) NULL,
	prenom  VARCHAR(64) NULL,
	adresse VARCHAR2(255) NULL,
	ville VARCHAR(128) NULL,
	code_postal MEDIUMINT NULL,
	Complement_adresse VARCHAR2(128) NULL,
);



