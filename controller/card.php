<?php
namespace controller;

class card{

    function index(){
        $panier = $this->getUserCard();
        $articlePanier = [];

        // DEBUG DEBUT
        // $article = new \backend\entity\PanierArticleEntity(1,"M",1);
        // $panier->addPanierArticle($article);
        // $article2 = new \backend\entity\PanierArticleEntity(2,"L",1);
        // $panier->addPanierArticle($article2);
        // DEBUG FIN
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

    function payment(){
        $personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
        // Récupérer le panier de l'utilisateur
        $panier = $this->getUserCard();
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

}

?>