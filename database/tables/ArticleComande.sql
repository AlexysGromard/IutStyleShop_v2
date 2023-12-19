--Table Ticket
CREATE OR REPLACE TABLE ArticleComande(
    id_commande INT PRIMARY KEY  NOT NULL,
    id_Article INT PRIMARY KEY  NOT NULL,
    taille VARCHAR(4) NOT NULL,
    prix_unitaire FLOAT NOT NULL,	-- ne peut pas etre negatif
    promo TINYINT NOT NULL, -- ne peut pas etre < 0 ou >100
    quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
FOREIGN KEY (id_commande) REFERENCES Commande(id),
FOREIGN KEY (id_Article) REFERENCES Article (id)
);
