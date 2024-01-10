CREATE OR REPLACE TABLE Accessoire (
    id_Article INT PRIMARY KEY NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (id_Article) REFERENCES Article (id)
)