
CREATE OR REPLACE TABLE ArticleModele (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	ID_article INT NOT NULL,
	taille VARCHAR(4) NOT NULL, --pas plus de xxxl
    quantite INT NOT NULL,  -- ne peut pas etre a 0 ou >100
	FOREIGN KEY (ID_article) REFERENCES Article(id)
);
