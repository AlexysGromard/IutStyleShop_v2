--Table Panier
CREATE OR REPLACE TABLE Panier(
	ID_User INT NOT NULL, 
	ID_Article INT NOT NULL,
	taille VARCHAR(4) NULL, -- ne peut qu'omporté que des valeur choisie et max : xl
	quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
    PRIMARY KEY (ID_User, ID_Article),
    FOREIGN KEY (ID_User) REFERENCES User(id),
    FOREIGN KEY (ID_Article) REFERENCES Article(id)
)
