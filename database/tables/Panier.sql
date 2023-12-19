--Table Panier
CREATE TABLE Panier(
	ID_User INT PRIMARY KEY NOT NULL, 
	id_Article INT PRIMARY KEY NOT NULL,
	taille VARCHAR(4) NOT NULL, --ne peut qu'omporté que des valeur choisie et max : xxxl
	quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
	FOREIGN KEY (ID_User) REFERENCES User(id),
	FOREIGN KEY (id_Article) REFERENCES Article (id)
)
