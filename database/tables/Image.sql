CREATE OR REPLACE TABLE Image (
    id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    lien VARCHAR(255) NOT NULL UNIQUE,
    id_Article INT NOT NULL,
    FOREIGN KEY (id_Article) REFERENCES Article (id)
);