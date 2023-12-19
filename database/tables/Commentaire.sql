--Table Commentaire
CREATE TABLE Commentaire (
	ID_User INT PRIMARY KEY NOT NULL, 
	ID_Article INT PRIMARY KEY NOT NULL,
	note FLOAT NOT NULL,
	commentaire VARCHAR2(512) NULL,
	FOREIGN KEY (ID_User) REFERENCES User(id),
	FOREIGN KEY (ID_Article) REFERENCES Article(id)
);
