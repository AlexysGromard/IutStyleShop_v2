--Table Ticket
CREATE OR REPLACE TABLE Ticket(
    id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    id_commande INT NOT NULL,
    id_ArticleModele INT NOT NULL,
    prix_unitaire FLOAT NOT NULL,	- - ne peut pas etre negatif
    promo TINYINT NOT NULL, - – ne peut pas etre < 0 ou >100
    quantite TINYINT NOT NULL ,  - - ne peut pas etre a 0 ou >100
FOREIGN KEY (id_commande ) REFERENCES Commande(id),
FOREIGN KEY (id_ArticleModele ) REFERENCES ArticleModele (id)
);
