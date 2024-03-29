--Table Commande
CREATE OR REPLACE TABLE Commande(
    id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    date DATETIME DEFAULT NOW() NOT NULL,
    statut VARCHAR(16) NOT NULL,
    prix FLOAT NULL,	 -- ne peut pas etre negatif
FOREIGN KEY (id_user) REFERENCES User(id)
);

ALTER TABLE Commande MODIFY statut VARCHAR(16) CHARACTER SET utf8;