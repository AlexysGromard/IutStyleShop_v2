--Table Ticket
CREATE OR REPLACE TABLE ArticleCommande(
    id_commande INT  NOT NULL,
    id_Article INT  NOT NULL,
    taille VARCHAR(4) NULL,
    prix_unitaire FLOAT NOT NULL,	-- ne peut pas etre negatif
    quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
    
    PRIMARY KEY (id_commande, id_Article),
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_Article) REFERENCES Article (id)
);
