USE DB_IutStyleShop;

DELIMITER //

-- Trigger pour vérifier que le prix est positif
CREATE TRIGGER Article_check_price_positive
BEFORE INSERT ON Article
FOR EACH ROW
BEGIN
    IF NEW.prix < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le prix ne peut pas être négatif';
    END IF;
END //

-- Trigger pour vérifier que la promo est entre 0 et 100
CREATE TRIGGER Article_check_promo_range
BEFORE INSERT ON Article
FOR EACH ROW
BEGIN
    IF NEW.promo < 0 OR NEW.promo > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La promo doit être entre 0 et 100';
    END IF;
END //

-- Trigger pour vérifier que la note est entre 0 et 5
CREATE TRIGGER Article_check_note_range
BEFORE UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.notes < 0 OR NEW.notes > 5 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La note doit être entre 0 et 5';
    END IF;
END //

-- Trigger pour vérifier que votant est positif
CREATE TRIGGER Article_check_votant_positive
BEFORE UPDATE ON Article
FOR EACH ROW
BEGIN
    IF NEW.votant < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le nombre de votants ne peut pas être négatif';
    END IF;
END //

-- Trigger pour mettre à jour la note d'un article après insertion d'un commentaire
CREATE TRIGGER Commentaire_update_article_note
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article 
    SET notes = (SELECT AVG(note) FROM Commentaire WHERE id_Article = NEW.id_Article)
    WHERE id = NEW.id_Article;
END //

-- Trigger pour mettre à jour le nombre de votants après insertion d'un commentaire
CREATE TRIGGER Commentaire_update_article_votants
AFTER INSERT ON Commentaire
FOR EACH ROW
BEGIN
    UPDATE Article 
    SET votant = (SELECT COUNT(*) FROM Commentaire WHERE id_Article = NEW.id_Article)
    WHERE id = NEW.id_Article;
END //

-- Trigger pour vérifier que la quantité d'un accessoire est positive
CREATE TRIGGER Accessoire_check_quantity_positive
BEFORE INSERT ON Accessoire
FOR EACH ROW
BEGIN
    IF NEW.quantite < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La quantité ne peut pas être négative';
    END IF;
END //

-- Trigger pour vérifier que les quantités de vêtement sont positives
CREATE TRIGGER Vetement_check_quantities_positive
BEFORE INSERT ON Vetement
FOR EACH ROW
BEGIN
    IF NEW.quantite_XS < 0 OR NEW.quantite_S < 0 OR NEW.quantite_M < 0 
       OR NEW.quantite_L < 0 OR NEW.quantite_XL < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Les quantités ne peuvent pas être négatives';
    END IF;
END //

-- Trigger pour vérifier la quantité dans le panier
CREATE TRIGGER Panier_check_quantity_range
BEFORE INSERT ON Panier
FOR EACH ROW
BEGIN
    IF NEW.quantite < 1 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La quantité doit être entre 1 et 100';
    END IF;
END //

-- Trigger pour vérifier le prix unitaire dans ArticleCommande
CREATE TRIGGER ArticleCommande_check_priceunitaire_positive
BEFORE INSERT ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.prix_unitaire < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le prix unitaire ne peut pas être négatif';
    END IF;
END //

-- Trigger pour vérifier la quantité dans ArticleCommande
CREATE TRIGGER ArticleCommande_check_quantite_range
BEFORE INSERT ON ArticleCommande
FOR EACH ROW
BEGIN
    IF NEW.quantite < 1 OR NEW.quantite > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La quantité doit être entre 1 et 100';
    END IF;
END //

-- Trigger pour vérifier le prix total d'une commande
CREATE TRIGGER Commande_check_price_positif
BEFORE INSERT ON Commande
FOR EACH ROW
BEGIN
    IF NEW.prix_total < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le prix total ne peut pas être négatif';
    END IF;
END //

-- Trigger pour vérifier la réduction du code promo
CREATE TRIGGER CodePromo_check_promo_range
BEFORE INSERT ON CodePromo
FOR EACH ROW
BEGIN
    IF NEW.reduction < 0 OR NEW.reduction > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La réduction doit être entre 0 et 100';
    END IF;
END //

DELIMITER ;
