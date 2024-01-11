


-- Exemple d'insertion dans la table User
INSERT INTO User (email, telephone, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
VALUES 
('michel.rotel@gmail.com', '0265358367', SHA2('1234', 256), 'rotel', 'michel', 'M', 'client', '6 Av. de l Industrie', 'Argentan', 61200, NULL),
('Pierre.Delacour@gmail.com', '0782663921', SHA2('J!aime', 256), 'Delacour', 'Pierre', 'M', 'client', '12 Rue Marie Bascou', 'Lacaune', 81230, NULL),
('Externe.alexandre@outlook.com', '0692114867', SHA2('password', 256), 'Externe', 'alexandre', 'M', 'client', '6 Rue Neuve', 'Savy-Berlette,', 62690, NULL),
('flo@example.com', '0446294421', SHA2('floflo', 256), NULL, 'flo', 'M', 'client', NULL, NULL, NULL, NULL),
('inconnue@example.com', '0912375578', SHA2('cheeh', 256), NULL, NULL, 'None', 'client', NULL, NULL, NULL, NULL);






-- Exemple d'insertion dans la table Article avec les catégories spécifiques
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible)
VALUES 
('Sweat à capuche confortable', 'sweat-short', 'Unisexe', 'Gris', 'Sweat à capuche confortable', 0, 0, 39.99, 5, true),
('Short de sport respirant', 'sweat-short', 'Unisexe', 'Noir', 'Short de sport respirant', 0, 0, 29.99, 0, true),
('T-shirt imprimé stylé', 't-shirt', 'Homme', 'Blanc', 'T-shirt avec motif stylé', 0, 0, 19.99, 10, true),
('Tenue de sport complète pour l\'entraînement', 'Tenue de sport', 'Unisexe', 'Bleu', 'Tenue de sport complète pour l\'entraînement', 0, 0, 59.99, 15, true),
('Accessoire tendance pour tous les styles', 'accessoire', 'Non spécifié', 'Varié', 'Accessoire tendance pour tous les styles', 0, 0, 14.99, 8, false),
('T-shirt respirant pour femmes', 't-shirt', 'Femme', 'Rose', 'T-shirt respirant pour femmes', 0, 0, 24.99, 0, true),
('Sweat-shirt décontracté pour toutes les occasions', 'sweat-short', 'Unisexe', 'Bleu marine', 'Sweat-shirt décontracté pour toutes les occasions', 0, 0, 34.99, 12, true),
('Accessoire élégant pour compléter votre look', 'accessoire', 'Femme', 'Or', 'Accessoire élégant pour compléter votre look', 0, 0, 44.99, 0, true),
('Short de jogging confortable', 'sweat-short', 'Homme', 'Gris', 'Short de jogging confortable', 0, 0, 29.99, 10, true),
('Casquette tendance pour un style décontracté', 'accessoire', 'Unisexe', 'Noir', 'Casquette tendance pour un style décontracté', 0, 0, 19.99, 5, false);


-- Exemple d'insertion dans la table Accesoire
INSERT INTO Accessoire (id_Article, quantite)
VALUES 
(5,50),
(8,1),
(10,10000);


-- Exemple d'insertion dans la table Accesoire
INSERT INTO Vetement (id_Article, quantiteXS ,quantiteS ,quantiteM, quantiteL,quantiteXL)
VALUES 
(1,10,65,4989,102,164),
(2,5,0,465,7989,30),
(3,73878,1564,2574,7354,4345),
(4,0,4646,0,454,0),
(6,0,0,0,0,0),
(7,1,786,78676,72785,735524),
(9,738753,0,4978789,3,4532);


-- Exemple d'insertion dans la table AccesoirImagese
INSERT INTO Image (lien, id_Article)
VALUES 
("ImageTest1",1),
("ImageTest2",2),
("ImageTest3",3);




