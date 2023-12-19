--Table Article
CREATE OR REPLACE TABLE Article (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	nom VARCHAR(128) NOT NULL,
	category VARCHAR(128) NOT NULL,
	genre VARCHAR(16) NOT NULL,
	couleur VARCHAR(32) NOT NULL,
	description VARCHAR(256) NULL,
	votant INT NOT NULL,
	notes	FLOAT NOT NULL, 
	prix FLOAT NOT NULL,-- ne peut pas etre negatif
	promo TINYINT NOT NULL  -- ne peut pas etre < 0 ou >100
	disponible BOOLEAN NOT NULL,
);
