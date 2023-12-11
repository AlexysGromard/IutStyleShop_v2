--Table Panier
CREATE TABLE Panier(
	ID_User INT PRIMARY KEY NOT NULL, 
	id_ArticleModele INT PRIMARY KEY NOT NULL,
	 quantite TINYINT NOT NULL ,  - - ne peut pas etre a 0 ou >100
	FOREIGN KEY (ID_User) REFERENCES User(id),
FOREIGN KEY (id_ArticleModele ) REFERENCES ArticleModele (id)
)
