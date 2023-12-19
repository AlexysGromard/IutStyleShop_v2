CREATE OR REPLACE TABLE Vetement (
    id_Article INT PRIMARY KEY NOT NULL,
    quantiteXS  INT NOT NULL,
    quantiteS  INT NOT NULL,
    quantiteM  INT NOT NULL,
    quantiteL  INT NOT NULL,
    quantiteXL  INT NOT NULL,
    FOREIGN KEY (id_Article) REFERENCES Article (id)
)