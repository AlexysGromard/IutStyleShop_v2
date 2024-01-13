<?php
namespace controller;

class products{

    function index(){
        $this->dao = new \backend\DAO\DBArticle();
        $mesArticles = $this->dao->getall();
        $param = array(true,true,true,true,true,true,true,true,true,0,100); 
        require "frontend/all-products/index_bd.php";
    }

    /*
        0 tshirt (booléen) : Indique si les t-shirts sont inclus dans le filtre.
        1 sweatshirt (booléen) : Indique si les sweatshirts sont inclus dans le filtre.
        2 sportswear (booléen) : Indique si les sweatshirts sont inclus dans le filtre.
        3 accessories (booléen) : Indique si les accessoires sont inclus dans le filtre.
        4 red (booléen) : Indique si la couleur rouge est incluse dans le filtre.
        5 green (booléen) : Indique si la couleur verte est incluse dans le filtre.
        6 blue (booléen) : Indique si la couleur bleue est incluse dans le filtre.
        7 white (booléen) : Indique si la couleur blanche est incluse dans le filtre.
        8 black (booléen) : Indique si la couleur noire est incluse dans le filtre.
        9 prixMin (chaîne de caractères) : La valeur minimale pour le filtre de prix.
        10 prixMax (chaîne de caractères) : La valeur maximale pour le filtre de prix.
    */
    function filter($param){
        $this->dao = new \backend\DAO\DBArticle();
        $mesArticles = array();
        $longueur = 11;
        if(count($param)==$longueur){
            $categorie = array("t-shirt","sweat-short","sports-wear","accessoire");
            $couleur = array('red','green','blue','white','black');

            for($i=0; $i<count($categorie);$i++){
                if($param[$i]=="true"){
                    for($j=0; $j<5;$j++){
                        if($param[count($categorie)+$j]=="true"){
                            $articles = $this->dao->getArticleByCondition($categorie[$i],$couleur[$j],array_slice($param, -2));
                          
                            $mesArticles = array_merge($mesArticles, $articles);
                            
                        }
                    }
                }
            }
            
            require "frontend/all-products/index_bd.php";

        }else{
            require "frontend/all-products/index.php";
        }
    }

    function search(){
        // Récupérer les données du formulaire
        $search = $_POST['search'];

        if (empty($search)){
            // Retourner à la page précédente
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        require "backend/search.php";
        $results = search($search);

        // Rediriger vers la page des produits
        // TODO : Indiquer dans la page les articles
        require "frontend/all-products/index.php";
    }

}

?>