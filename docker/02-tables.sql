USE DB_IutStyleShop;

CREATE TABLE IF NOT EXISTS Article (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	nom VARCHAR(128) NOT NULL,
	category VARCHAR(128) NOT NULL,
	genre VARCHAR(16) NOT NULL,
	couleur VARCHAR(32) NOT NULL,
	description VARCHAR(256) NULL,
	votant INT NOT NULL DEFAULT 0,
	notes FLOAT NOT NULL DEFAULT 0, 
	prix FLOAT NOT NULL,
	promo TINYINT NOT NULL DEFAULT 0,
	disponible BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS User (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    email VARCHAR(255) NOT NULL UNIQUE,
    telephone VARCHAR(10) DEFAULT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(64) DEFAULT NULL,
    prenom VARCHAR(64) DEFAULT NULL,
    genre VARCHAR(16) DEFAULT NULL,
    role VARCHAR(16) NOT NULL,
    adresse VARCHAR(255) DEFAULT NULL,
    ville VARCHAR(128) DEFAULT NULL,
    code_postal MEDIUMINT DEFAULT NULL,
    Complement_adresse VARCHAR(128) DEFAULT NULL
);

INSERT IGNORE INTO User (email, telephone, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
VALUES ('admin@iutstyleshop.com', '0102030405', SHA2('admin', 256), 'admin', 'admin', 'N', 'admin', 'admin', 'admin', 0, 'admin');

CREATE TABLE IF NOT EXISTS Image (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    id_Article INT NOT NULL,
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);

CREATE TABLE IF NOT EXISTS CodePromo (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    code VARCHAR(50) NOT NULL UNIQUE,
    reduction TINYINT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS Commande (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    prix_total FLOAT NOT NULL DEFAULT 0,
    etat VARCHAR(32) NOT NULL,
    id_code_promo INT DEFAULT NULL,
    FOREIGN KEY (id_user) REFERENCES User(id),
    FOREIGN KEY (id_code_promo) REFERENCES CodePromo(id)
);

CREATE TABLE IF NOT EXISTS Accessoire (
    id_Article INT PRIMARY KEY NOT NULL,
    quantite INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);

CREATE TABLE IF NOT EXISTS Vetement (
    id_Article INT PRIMARY KEY NOT NULL,
    quantite_XS INT NOT NULL DEFAULT 0,
    quantite_S INT NOT NULL DEFAULT 0,
    quantite_M INT NOT NULL DEFAULT 0,
    quantite_L INT NOT NULL DEFAULT 0,
    quantite_XL INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);

CREATE TABLE IF NOT EXISTS ArticleCommande (
    id_commande INT NOT NULL,
    id_Article INT NOT NULL,
    taille VARCHAR(4) NULL,
    prix_unitaire FLOAT NOT NULL,
    quantite TINYINT NOT NULL,
    PRIMARY KEY (id_commande, id_Article),
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);

CREATE TABLE IF NOT EXISTS Panier (
    id_user INT NOT NULL,
    id_Article INT NOT NULL,
    taille VARCHAR(4) NULL,
    quantite TINYINT NOT NULL DEFAULT 1,
    PRIMARY KEY (id_user, id_Article),
    FOREIGN KEY (id_user) REFERENCES User(id),
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);

CREATE TABLE IF NOT EXISTS Commentaire (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_Article INT NOT NULL,
    note TINYINT NOT NULL,
    commentaire TEXT,
    date_commentaire TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES User(id),
    FOREIGN KEY (id_Article) REFERENCES Article(id)
);
