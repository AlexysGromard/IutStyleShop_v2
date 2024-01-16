<?php
namespace controller;

class card{

    function index(){
        $panier = $this->getUserCard();
        $articlePanier = [];

        // Récupéérer article grâce à id et mettre id en clé
        foreach ($panier->getPanierArticles() as $article) {
            $DAOArticle = new \backend\DAO\DBArticle();
            $articlePanier[$article->getIdArticle()] = $DAOArticle::getById($article->getIdArticle());
        };

        // Code promotionnel
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["codePromo"])){
            $codePromo = $_SESSION["codePromo"];
        } 
        require "frontend/card/index.php";
    }

    /*
    * Récupérer le panier de l'utilisateur (inscrit ou non)
    */
    private function getUserCard() : \backend\entity\PanierEntity{
        session_start();
        // Si USER est connecté
        if(isset($_SESSION["user"])){
            // Récupère le panier de l'utilisateur
            $panier = $_SESSION["user"]->getPanier();
        } else if (isset($_SESSION["panier"])) {
            // Récupère le panier de l'utilisateur non connecté
            $panier = $_SESSION["panier"];
        } else {
            // Créer un panier vide
            $panier = new \backend\entity\PanierEntity([]);
        }
        $_SESSION["panier"] = $panier;
        return $panier;
    }

    /*
    * Retirer un article du panier
    */
    function removeArticleFromCard(array $params){
        $id = $params[0];
        $size = $params[1];
        $quantity = $params[2];

        // Créer un PanierArticleEntity à supprimer
        $articleDelete = new \backend\entity\PanierArticleEntity($id, $size, $quantity);

        // Si il n'y a pas de session, en créer une
        if (!isset($_SESSION)) {
            session_start();
        }

        // Si USER est connecté, supprimer de la BD
        if(isset($_SESSION["user"])){
            $DAOPanier = new \backend\DAO\DBPanier();
            $DAOPanier::deleteArticle($articleDelete, $_SESSION["user"]);
        } else {
            $panier = $this->getUserCard();
            $panier->removePanierArticle($articleDelete);
            $_SESSION["panier"] = $panier; 
        }

        header("Location: /card");
    }

    /*
    * Ajouter un code promo
    */
    function addPromoCode(){
        $codePromo = $_POST["code"];

        // Echaper les données
        $codePromo = htmlspecialchars($codePromo, ENT_QUOTES, 'UTF-8');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $DAOCodePromo = new \backend\DAO\DBCodePromo();
        $codePromoList = $DAOCodePromo::getall();

        foreach ($codePromoList as $code) {
            if($code->getCode() == $codePromo){
                $_SESSION["codePromo"] = $code;
                header("Location: /card");
                exit();
            }
        }

        // Si codepromo vide : Supprimer code promo actuel
        if(empty($codePromo) && isset($_SESSION["codePromo"])){
            unset($_SESSION["codePromo"]);
        }

        header("Location: /card");
    }

    /*
    *  Afficher la page de paiement
    */
    function payment(){
        $personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
        // Récupérer le panier de l'utilisateur
        $panier = $this->getUserCard();

        // Créer panier pour PDO
        $panierPDO = new \backend\DAO\DBPanier();

        // Récupérer le code promo
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["codePromo"])){
            $codePromo = $_SESSION["codePromo"];
        } else {
            $codePromo = null;
        }

        require "frontend/payment/payment.php";
    }

    /*
    *   Ajouter un article au panier
    */
    function addProduct($productId){
        if (!isset($productId[0]) || !isset($_POST["size"]) || empty($_POST["size"])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $id = $productId[0];
        // Récupérer valeur en POST
        $size = $_POST["size"];

        // Echaper les données
        $size = htmlspecialchars($size, ENT_QUOTES, 'UTF-8');

        // Créer un PanierArticleEntity à ajouter
        $articleAdd = new \backend\entity\PanierArticleEntity($id, $size, 1);

        // Si il n'y a pas de session, en créer une
        if (!isset($_SESSION)) {
            session_start();
        }

        // Si USER est connecté, ajouter à la BD
        if(isset($_SESSION["user"])){
            $DAOPanier = new \backend\DAO\DBPanier();
            $DAOPanier::add($articleAdd, $_SESSION["user"]);
        } else {
            $panier = $this->getUserCard();
            $panier->addPanierArticle($articleAdd);
            $_SESSION["panier"] = $panier; 
        }

        header("Location: /card");
    }

}

?>