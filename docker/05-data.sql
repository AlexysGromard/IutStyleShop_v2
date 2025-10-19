USE DB_IutStyleShop;

-- Insertion des articles IUT basés sur products.json

-- T-shirts
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible) VALUES
('T-Shirt Rouge IUT', 'T-Shirt', 'Unisexe', 'Rouge', 'T-Shirt Rouge IUT 100% coton avec logo IUT sur la poitrine', 8, 4.5, 19.99, 0, TRUE),
('T-Shirt IUT blanc', 'T-Shirt', 'Unisexe', 'Blanc', 'T-Shirt IUT blanc avec logo. Vous aurez la classe dans Nantes', 6, 4.5, 19.99, 0, TRUE);

-- Sweatshirts
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible) VALUES
('Sweat Rouge IUT', 'Sweatshirt', 'Unisexe', 'Rouge', 'Sweat Rouge IUT 100% coton avec logo IUT sur la poitrine. Peut être porté avec un t-shirt rouge IUT', 12, 4.5, 39.99, 0, TRUE),
('Sweatshirt IUT noir', 'Sweatshirt', 'Unisexe', 'Noir', 'Super sweatshirt IUT noir avec logo. Vous aurez la classe dans Nantes', 10, 4.5, 39.99, 0, TRUE),
('Sweatshirt IUT vert', 'Sweatshirt', 'Unisexe', 'Vert', 'Changez les codes couleurs avec ce sweatshirt IUT vert', 9, 4.5, 39.99, 10, TRUE),
('Sweatshirt IUT blanc', 'Sweatshirt', 'Unisexe', 'Blanc', 'Sweatshirt IUT blanc confortable et stylé', 7, 4.5, 39.99, 0, TRUE);

-- Maillots Sport Femme
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible) VALUES
('Maillot blanc IUT pour femme', 'Maillot', 'Femme', 'Blanc', 'Mesdames, voici le maillot qu il vous faut pour vos sorties sportives', 15, 4.5, 22.99, 0, TRUE),
('Maillot noir IUT pour femme', 'Maillot', 'Femme', 'Noir', 'Mesdames, voici le maillot qu il vous faut pour vos sorties sportives', 14, 4.5, 22.99, 0, TRUE);

-- Maillots Sport Homme
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible) VALUES
('Maillot blanc IUT pour homme', 'Maillot', 'Homme', 'Blanc', 'Messieurs, voici le maillot qu il vous faut pour vos sorties sportives', 13, 4.5, 22.99, 0, TRUE),
('Maillot noir IUT pour homme', 'Maillot', 'Homme', 'Noir', 'Messieurs, voici le maillot qu il vous faut pour vos sorties sportives', 11, 4.5, 22.99, 0, TRUE),
('Maillot IUT Nike', 'Maillot', 'Unisexe', 'Noir', 'Profitez de notre collaboration avec Nike pour vous offrir le meilleur des maillots de sport', 20, 4.5, 34.99, 15, TRUE);

-- Accessoires
INSERT INTO Article (nom, category, genre, couleur, description, votant, notes, prix, promo, disponible) VALUES
('Casquette Noire IUT', 'Accessoire', 'Unisexe', 'Noir', 'Casquette Noire IUT avec logo. Vous aurez la classe dans Nantes', 18, 4.5, 16.99, 0, TRUE),
('MUG Blanc IUT', 'Accessoire', 'Unisexe', 'Blanc', 'Mug Blanc IUT avec logo. Parfait pour le café du matin. Vous aurez également 0.05€ de remise à la machine à café de l IUT', 22, 4.5, 14.99, 0, TRUE),
('Gourde IUT Blanc', 'Accessoire', 'Unisexe', 'Blanc', 'Gourde IUT Blanc avec logo. Parfait pour les plus sportif d entre-nous', 16, 4.5, 12.99, 0, TRUE),
('Sac de sport IUT noir', 'Accessoire', 'Unisexe', 'Noir', 'Portez vos affaire de sport avec style grâce à ce sac de sport IUT', 19, 4.5, 25.75, 0, TRUE),
('Stylo IUT rouge', 'Accessoire', 'Unisexe', 'Rouge', 'Rédigez vos meilleurs DS avec ce stylo IUT', 25, 4.5, 3.99, 0, TRUE);

-- Ajout des stocks pour les vêtements (tailles)
INSERT INTO Vetement (id_Article, quantite_XS, quantite_S, quantite_M, quantite_L, quantite_XL) VALUES
(1, 10, 15, 20, 15, 10),   -- T-Shirt Rouge IUT
(2, 8, 12, 18, 12, 8),     -- T-Shirt IUT blanc
(3, 12, 18, 25, 20, 12),   -- Sweat Rouge IUT
(4, 10, 16, 22, 18, 10),   -- Sweatshirt IUT noir
(5, 8, 14, 20, 16, 8),     -- Sweatshirt IUT vert
(6, 7, 12, 18, 14, 7),     -- Sweatshirt IUT blanc
(7, 15, 20, 25, 20, 12),   -- Maillot blanc femme
(8, 14, 19, 24, 19, 11),   -- Maillot noir femme
(9, 12, 18, 24, 18, 10),   -- Maillot blanc homme
(10, 11, 17, 23, 17, 9),   -- Maillot noir homme
(11, 10, 15, 22, 15, 8);   -- Maillot Nike

-- Ajout des stocks pour les accessoires
INSERT INTO Accessoire (id_Article, quantite) VALUES
(12, 50),  -- Casquette
(13, 40),  -- Mug
(14, 35),  -- Gourde
(15, 25),  -- Sac de sport
(16, 100); -- Stylo

-- Ajout des images avec les bons chemins
INSERT INTO Image (url, id_Article) VALUES
-- T-shirts
('/frontend/products/tshirt_iut_rouge/image1.png', 1),
('/frontend/products/tshirt_iut_blanc/image1.png', 2),

-- Sweatshirts
('/frontend/products/sweatshirt_iut_rouge/image1.png', 3),
('/frontend/products/sweatshirt_iut_rouge/image2.png', 3),
('/frontend/products/sweatshirt_iut_noir/image1.png', 4),
('/frontend/products/sweatshirt_iut_vert/image1.png', 5),
('/frontend/products/sweatshirt_iut_blanc/image1.png', 6),

-- Maillots Femme
('/frontend/products/maillot_iut_femme_blanc/image1.png', 7),
('/frontend/products/maillot_iut_femme_noir/image1.png', 8),

-- Maillots Homme
('/frontend/products/maillot_iut_homme_blanc/image1.png', 9),
('/frontend/products/maillot_iut_homme_noir/image1.png', 10),
('/frontend/products/maillot_iut_nike_noir/image1.png', 11),

-- Accessoires
('/frontend/products/casquette_noire_iut/image1.png', 12),
('/frontend/products/mug_iut/image1.png', 13),
('/frontend/products/gourde_iut/image1.png', 14),
('/frontend/products/sac_de_sport_iut_noir/image1.png', 15),
('/frontend/products/stylo_iut_rouge/image1.png', 16);

-- Ajout de quelques commentaires
INSERT INTO Commentaire (id_user, id_Article, note, commentaire) VALUES
(1, 1, 5, 'Excellent t-shirt, très confortable et de bonne qualité!'),
(1, 3, 5, 'Super sweat, parfait pour l hiver'),
(1, 11, 5, 'Maillot Nike au top, très belle collaboration!'),
(1, 13, 4, 'Bon mug, parfait pour le café du matin'),
(1, 16, 5, 'Stylo pratique pour les DS!');

-- Ajout de codes promo
INSERT INTO CodePromo (code, reduction, date_debut, date_fin) VALUES
('IUT2025', 15, '2025-01-01', '2025-12-31'),
('ETUDIANT20', 20, '2025-01-01', '2025-06-30'),
('RENTREE25', 25, '2025-09-01', '2025-10-31');

