


-- Exemple d'insertion dans la table User
INSERT INTO User (email, telephone, password, nom, prenom, genre, role, adresse, ville, code_postal, Complement_adresse)
VALUES 
('michel.rotel@gmail.com', '0265358367', SHA2('1234', 256), 'rotel', 'michel', 'M', 'client', '6 Av. de l Industrie', 'Argentan', 61200, NULL),
('Pierre.Delacour@gmail.com', '0782663921', SHA2('J!aime', 256), 'Delacour', 'Pierre', 'M', 'client', '12 Rue Marie Bascou', 'Lacaune', 81230, NULL),
('Externe.alexandre@outlook.com', '0692114867', SHA2('password', 256), 'Externe', 'alexandre', 'M', 'client', '6 Rue Neuve', 'Savy-Berlette,', 62690, NULL),
('flo@example.com', '0446294421', SHA2('floflo', 256), NULL, 'flo', 'M', 'client', NULL, NULL, NULL, NULL),
('inconnue@example.com', '0912375578', SHA2('cheeh', 256), NULL, NULL, 'None', 'client', NULL, NULL, NULL, NULL);






-- Exemple d'insertion dans la table Article avec les catégories spécifiques
-- Insertion des données dans la table Article
INSERT INTO Article (nom, category,genre, description, votant, notes, prix, couleur, promo, disponible)
VALUES
  ('T-Shirt Rouge IUT', 't-shirt','M', 'T-Shirt Rouge IUT 100% coton avec logo IUT sur la poitrine. Disponible en taille XS, S, M, L, XL. Cet article fait partie des bestSeller.', 0, 4.5, 19.99, 'red', 0, 1),
  ('Sweat Rouge IUT', 'sweat-short','M', 'Swet Rouge IUT 100% coton avec logo IUT sur la poitrine. Disponible en taille XS, S, M, L, XL. Cet article fait partie des bestSeller. Peut être porté avec un t-shirt rouge IUT.', 0, 4.5, 39.99, 'red', 0, 1),
  ('MUG Blanc IUT', 'accessoire','MF', 'Mug Blanc IUT avec logo. Parfait pour le café du matin. Disponible en blanc. Vous aurez également 0.05€ de remise à la machine à café de l IUT.', 0, 4.5, 14.99, 'white', 0, 1),
  ('Casquette Noire IUT', 'accessoire','MF', 'Casquette Noire IUT avec logo. Vous aurez la classe dans Nantes. Disponible en noir.', 0, 1.5, 16.99, 'black', 0, 1),
  ('Gourde IUT Blanc', 'accessoire','MF', 'Gourde IUT Blanc avec logo. Parfait pour les plus sportifs d entre-nous. Disponible en blanc.', 0, 4.5, 12.99, 'white', 0, 1),
  ('Maillot IUT Nike', 'sports-wear', 'M','Profitez de notre collaboration avec Nike pour vous offrir le meilleur des maillots de sport. Disponible en noir.', 0, 4.5, 34.99, 'black', 0, 1),
  ('Maillot blanc IUT pour femme', 'sports-wear', 'F','Mesdames, voici le maillot qu il vous faut pour vos sorties sportives. Profitez en vite ! Disponible en blanc et en noir.', 0, 4.5, 22.99, 'white', 0, 1),
  ('Maillot noir IUT pour femme', 'sports-wear','F', 'Mesdames, voici le maillot qu il vous faut pour vos sorties sportives. Profitez en vite ! Disponible en blanc et en noir.', 0, 4.5, 22.99, 'black', 0, 1),
  ('Maillot blanc IUT pour homme', 'sports-wear','M', 'Messieurs, voici le maillot qu il vous faut pour vos sorties sportives. Profitez en vite ! Disponible en blanc et en noir.', 0, 4.5, 22.99, 'white', 0, 1),
  ('Maillot noir IUT pour homme', 'sports-wear','M', 'Messieurs, voici le maillot qu il vous faut pour vos sorties sportives. Profitez en vite ! Disponible en blanc et en noir.', 0, 4.5, 22.99, 'black', 0, 1),
  ('Sac de sport IUT noir', 'accessoire','MF', 'Portez vos affaires de sport avec style grâce à ce sac de sport IUT. Disponible en noir.', 0, 3.5, 25.75, 'black', 0, 1),
  ('Stylo IUT rouge', 'accessoire','MF', 'Rédigez vos meilleurs DS avec ce stylo IUT. Disponible en rouge.', 0, 4.5, 3.99, 'red', 0, 1),
  ('Sweatshirt IUT noir', 'sweat-short','M', 'Super sweat-short IUT noir avec logo. Vous aurez la classe dans Nantes. Disponible en noir, vert et rouge.', 0, 4.5, 39.99, 'black', 0, 1),
  ('Sweatshirt IUT vert', 'sweat-short','M', 'Changez les codes couleurs avec ce sweat-short IUT vert. Disponible en noir, vert et rouge.', 0, 2.5, 39.99, 'green', 0, 1),
  ('T-Shirt IUT blanc', 't-shirt','M', 'T-Shirt IUT blanc avec logo. Vous aurez la classe dans Nantes. Disponible en blanc.', 0, 4.5, 19.99, 'white', 0, 1);

-- Exemple d'insertion dans la table AccesoirImages
INSERT INTO Image (lien, id_Article)
VALUES
  ('/frontend/products/tshirt_iut_rouge/image1.png', 1),
  ('/frontend/products/sweatshirt_iut_rouge/image1.png', 2),
  ('/frontend/products/sweatshirt_iut_rouge/image2.png', 2),
  ('/frontend/products/mug_iut/image1.png', 3),
  ('/frontend/products/casquette_noire_iut/image1.png', 4),
  ('/frontend/products/gourde_iut/image1.png', 5),
  ('/frontend/products/maillot_iut_nike_noir/image1.png', 6),
  ('/frontend/products/maillot_iut_femme_blanc/image1.png', 7),
  ('/frontend/products/maillot_iut_femme_noir/image1.png', 8),
  ('/frontend/products/maillot_iut_homme_blanc/image1.png', 9),
  ('/frontend/products/maillot_iut_homme_noir/image1.png', 10),
  ('/frontend/products/sac_de_sport_iut_noir/image1.png', 11),
  ('/frontend/products/stylo_iut_rouge/image1.png', 12),
  ('/frontend/products/sweatshirt_iut_noir/image1.png', 13),
  ('/frontend/products/sweatshirt_iut_vert/image1.png', 14),
  ('/frontend/products/tshirt_iut_blanc/image1.png', 15);


-- Ajout des accessoires dans la table Accessoire
INSERT INTO Accessoire (id_Article, quantite)
VALUES
  (3, 100),  -- Mug Blanc IUT
  (4, 50),   -- Casquette Noire IUT
  (5, 75),   -- Gourde IUT Blanc
  (11, 30),  -- Sac de sport IUT noir
  (12, 200); -- Stylo IUT rouge



-- Ajout des vêtements dans la table Vetement
INSERT INTO Vetement (id_Article, quantiteXS, quantiteS, quantiteM, quantiteL, quantiteXL)
VALUES
  (1, 50, 100, 150, 100, 50),    -- T-Shirt Rouge IUT
  (2, 30, 60, 90, 60, 30),       -- Sweat Rouge IUT
  (6, 40, 80, 120, 80, 40),      -- Maillot IUT Nike
  (7, 20, 40, 60, 40, 20),       -- Maillot blanc IUT pour femme
  (8, 20, 40, 60, 40, 20),       -- Maillot noir IUT pour femme
  (9, 20, 40, 60, 40, 20),       -- Maillot blanc IUT pour homme
  (10, 20, 40, 60, 40, 20),      -- Maillot noir IUT pour homme
  (13, 30, 60, 90, 60, 30),      -- Sweatshirt IUT noir
  (14, 30, 60, 90, 60, 30),      -- Sweatshirt IUT vert
  (15, 50, 100, 150, 100, 50);   -- T-Shirt IUT blanc







