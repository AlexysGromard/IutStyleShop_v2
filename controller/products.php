<?php
namespace controller;

class products{

    function index(){
        $this->dao = new \backend\DAO\DBArticle();
        $mesArticles = $this->dao->getall();
        foreach($mesArticles as $art){
            if ($art == null){
                echo "<h1> OUIIIII </h1>";
            }
        }
        $param = array(true,true,true,true,true,true,true,true,true,0,100,true,true,false,true,true); 
        require "frontend/all-products/index_bd.php";
    }

    function accessoire(){
        $param = array("false","false","false","true","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        $this->filter($param);
    }
    function tshirt(){
        $param = array("true","false","false","false","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        $this->filter($param);
    }
    function sportswear(){
        $param = array("false","false","true","false","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        $this->filter($param);
    
    }
    function sweatshirt(){
        $param = array("false","true","false","false","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        $this->filter($param);
    }
    function promotion(){
        $param = array("true","true","true","true","true","true","true","true","true",0,100,"true","true","true","true","true",""); 
        $this->filter($param);
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
        11 homme (booléen) : Indique le genre Homme est inclus dans le filtre.
        12 femme (booléen) : Indique le genre Femme est inclus dans le filtre.
        13 promo (booléen) : Indique d'afficher seulement les articles en promo.
        14 disponible (booléen) : Indique d'afficher les articles disponible
        15 nondisponible (booléen) : Indique d'afficher les articles non disponible
        16 motsderecherche (string) : indique la recherche effectuer


    */
    function filter($param){
        $this->dao = new \backend\DAO\DBArticle();
        $longueur = 17;

        
        if(count($param)==$longueur){
            $categorie = array("t-shirt","sweat-short","sports-wear","accessoire");
            $couleur = array('red','green','blue','white','black');
            $categorieChoisi = array();
            $couleurChoisi = array();

            for($i=0; $i<count($categorie);$i++){
                if($param[$i]=="true"){
                    $categorieChoisi[] = $categorie[$i];
                }
            }
            for($j=0; $j<count($couleur);$j++){
                if($param[count($categorie)+$j]=="true"){
                    $couleurChoisi[] = $couleur[$j];              
                }
            }
            $genre ="";
            if ($param[11]=="true"){
                $genre .= "M";
            }
            if ($param[12]=="true"){
                $genre .= "F";
            }
            $mesArticles = $this->dao->getArticleByCondition($categorieChoisi,$couleurChoisi,array($param[9],$param[10]),$genre,false,2);
            //todo : filiterbyname()

            require "frontend/all-products/index_bd.php";

        }else{
            //require "frontend/all-products/index.php";
            require "frontend/404.php";
        }
    }

    private function filiterbyname($search,$articles){ //TODO : doit retourner les articles
        // Récupérer tous les articles
        $products = getProductNames();

        // Limite de coeefficient de ressemblance
        $limiteCoefficientRessemblance = 0.25;

        // Calculer les coefficients de ressemblance pour chaque produit
        $coefficients = array();
        foreach ($products as $product) {
            $coefficient = calculerCoefficientRessemblance($query, $product);
            $coefficients[$product] = $coefficient;
        }

        // Trier les résultats en fonction des coefficients de ressemblance (du plus grand au plus petit)
        arsort($coefficients);

        // Supprimer les résultats dont le coefficient de ressemblance est inférieur à la limite
        $coefficients = array_filter($coefficients, function($coefficient) use ($limiteCoefficientRessemblance) {
            return $coefficient >= $limiteCoefficientRessemblance;
        });

        return $coefficients;
    }

    function search(){
        // Récupérer les données du formulaire
        $search = $_POST['search'];

        // Echapement des données
        $search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');

        if (empty($search)){
            // Retourner à la page précédente
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        require "backend/search.php";
        $results = search($search);

        echo"<pre>";
        var_dump($results); 
        echo"</pre>";

        // Rediriger vers la page des produits
        require "frontend/all-products/index_bd.php";
    }

}

?>