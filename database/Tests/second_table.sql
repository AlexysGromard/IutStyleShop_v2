

-- Exemple d'insertion dans la table CodePromo
INSERT INTO CodePromo (texte, promo) 
VALUES
('20/20',100),
('iutStyleShop',10),
('XIV is the best', 75),
('Bini ???', 65),
('IUT', 1),
('Alexys_Gr !',15),
('FloranNinja :)',45);

-- Exemple d'insertion dans la table Commentaire (note entre 1 et 5)(idArticle entre 1 et 10)(idUser entre 1 et 5)
INSERT INTO Commentaire ( ID_User, ID_Article, note, commentaire)
VALUES
(1,1,5,'Super produit'),
(2,2,4,'Bon produit'),
(3,3,3,'Moyen produit'),
(4,4,2,'Mauvais produit'),
(5,5,1,'Très mauvais produit'),
(1,6,5,'Super produit'),
(2,7,4,'Bon produit'),
(3,8,3,'Moyen produit'),
(4,9,2,'Mauvais produit'),
(5,10,1,'Très mauvais produit');

-- Exemple d'insertion dans la table ArticleCommande (idUser entre 1 et 5)(idArticle entre 1 et 10)(taille si id idArticle == 5,8,10 alors taille =NUll ou bien xl l m s xs)(quantite de l'article lors de la commande)
INSERT INTO Panier ( ID_User, id_Article, taille, quantite)
VALUES 
(1,1,'xl',1),
(2,2,'l',1),
(3,3,'m',1),
(4,4,'s',1),
(5,5,NULL,1),
(1,6,'xl',1),
(2,7,'l',1),
(3,8,'m',1),
(4,9,'s',1),
(5,10,NULL,1);




-- Exemple d'insertion dans la table Commande (idUser entre 1 et 5) (Date au format 'YYYY-MM-DD HH:MI:SS' qui est automatiquement généré)
INSERT INTO Commande ( ID_User, statut)
VALUES
(1,'En cours'),
(5,'Refusé'),
(3,'Terminé'),
(2,'En cours'),
(4,'En cours'),
(1,'En cours'),
(5,'Refusé'),
(3,'Terminé'),
(2,'En cours'),
(4,'En cours'),
(1,'En cours'),
(5,'Refusé'),
(3,'Terminé'),
(2,'En cours'),
(4,'En cours'),
(1,'En cours'),
(5,'Refusé'),
(3,'Terminé');

--(idArticle entre 1 et 10)(idCommande entre 1 et 18)(taille si id idArticle == 5,8,10 alors taille =NUll ou bien xl l m s xs)(quantite)
-- Exemple d'insertion dans la table ArticleCommande (idArticle entre 1 et 10)(idCommande entre 1 et 18)(taille si id idArticle == 5,8,10 alors taille =NUll ou bien xl l m s xs)(PrixUnitaire de l'article lors de la commande)(quantite de l'article lors de la commande)
INSERT INTO ArticleCommande ( id_Article, id_Commande, taille, prix_unitaire, quantite)
VALUES 
(1, 1, 'M', 19.99, 2),
(2, 1, 'L', 29.99, 1),
(5, 2, NULL, 15.99, 3), 
(8, 2, 'XL', 39.99, 1), 
(10, 2, 'S', 9.99, 5), 
(1, 3, 'M', 19.99, 2),
(2, 3, 'L', 29.99, 1),
(5, 4, NULL, 15.99, 3), 
(8, 4, 'XL', 39.99, 1), 
(10, 4, 'S', 9.99, 5), 
(1, 5, 'M', 19.99, 2),
(2, 5, 'L', 29.99, 1),
(5, 6, NULL, 15.99, 3), 
(8, 6, 'XL', 39.99, 1), 
(10, 6, 'S', 9.99, 5), 
(1, 7, 'M', 19.99, 2),
(2, 7, 'L', 29.99, 1),
(5, 8, NULL, 15.99, 3), 
(8, 8, 'XL', 39.99, 1), 
(10, 8, 'S', 9.99, 5), 
(1, 9, 'M', 19.99, 2),
(2, 9, 'L', 29.99, 1),
(5, 10, NULL, 15.99, 3), 
(8, 10, 'XL', 39.99, 1), 
(10, 10, 'S', 9.99, 5), 
(1, 11, 'M', 19.99, 2),
(2, 11, 'L', 29.99, 1),
(5, 12, NULL, 15.99, 3), 
(8, 12, 'XL', 39.99, 1), 
(10, 12, 'S', 9.99, 5), 
(1, 13, 'M', 19.99, 2),
(2, 13, 'L', 29.99, 1),
(5, 14, NULL, 15.99, 3), 
(8, 14, 'XL', 39.99, 1), 
(10, 14, 'S', 9.99, 5), 
(1, 15, 'M', 19.99, 2),
(2, 15, 'L', 29.99, 1),
(5, 16, NULL, 15.99, 3), 
(8, 16, 'XL', 39.99, 1), 
(10, 16, 'S', 9.99, 5), 
(1, 17, 'M', 19.99, 2),
(2, 17, 'L', 29.99, 1),
(5, 18, NULL, 15.99, 3), 
(8, 18, 'XL', 39.99, 1), 
(10, 18, 'S', 9.99, 5); 


--Update de la table Commande pour ajouter le bon prix total
UPDATE Commande
SET prix = (SELECT SUM(prix_Unitaire * quantite) FROM ArticleCommande WHERE ArticleCommande.id_Commande = Commande.id);

--Update de la table Article pour ajouter le bon nombre de votant et la bonne note
UPDATE Article
SET votant = (SELECT COUNT(note) FROM Commentaire WHERE Commentaire.id_Article = Article.id),
notes = (SELECT COALESCE(AVG(note),0.0) FROM Commentaire WHERE Commentaire.id_Article = Article.id);


