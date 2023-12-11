--Table Commande
CREATE OR REPLACE TABLE Commande(
    id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    date DATETIME NOT NULL,
    statut VARCHAR(16) NOT NULL,
    prix FLOAT NOT NULL,	 -- ne peut pas etre negatif
FOREIGN KEY (id_user) REFERENCES User(id)
);
