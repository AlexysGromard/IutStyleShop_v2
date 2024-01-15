--Table Commentaire
CREATE OR REPLACE  TABLE Commentaire (
	ID_User INT NOT NULL, 
	ID_Article INT NOT NULL,
	note FLOAT NOT NULL,
	commentaire VARCHAR(512) DEFAULT NULL,
	PRIMARY KEY (ID_User, ID_Article),
	FOREIGN KEY (ID_User) REFERENCES User(id),
	FOREIGN KEY (ID_Article) REFERENCES Article(id)
);

ALTER TABLE Commentaire MODIFY commentaire VARCHAR(512) CHARACTER SET utf8;
