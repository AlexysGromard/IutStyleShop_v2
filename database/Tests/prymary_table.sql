-- Exemple d'insertion dans la table User
INSERT INTO User (email, password, nom, prenom, adresse, ville, code_postal, Complement_adresse)
VALUES 
('michel.rotel@gmail.com', '1234', 'rotel', 'michel', 'user', '6 Av. de l Industrie', 'Argentan', 61200, NULL),
('Pierre.Delacour@gmail.com', 'J!aime', 'Delacour', 'Pierre', 'user', '12 Rue Marie Bascou', 'Lacaune', 81230, NULL),
('Externe.alexandre@outlook.com', 'password', 'Externe', 'alexandre', 'user', '6 Rue Neuve', 'Savy-Berlette,', 62690,NULL),
('flo@example.com', 'floflo', NULL, 'flo', 'user', NULL, NULL,NULL, NULL),
('inconnue@example.com', 'cheeh', NULL, NULL, 'user', NULL, NULL, NULL, NULL);

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

