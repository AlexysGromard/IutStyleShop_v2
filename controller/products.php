<?php
namespace controller;

class products{

    private $pageTitle;

    function index(){
        $dao = new \backend\DAO\DBArticle();
        
        $mesArticles = $dao->getall();
        $param = array("true","true","true","true","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        require "frontend/all-products/index.php";
    }

    function accessoire(){
        $param = array("false","false","false","true","true","true","true","true","true",0,100,"true","true","false","true","true","");
        $this->pageTitle = "Accessoires";
        $this->filter($param);
    }
    function tshirt(){
        $param = array("true","false","false","false","true","true","true","true","true",0,100,"true","true","false","true","true",""); 
        $this->pageTitle = "T-shirts";
        $this->filter($param);
    }
    function sportswear(){
        $param = array("false","false","true","false","true","true","true","true","true",0,100,"true","true","false","true","true","");
        $this->pageTitle = "Tenues de sport";
        $this->filter($param);
    
    }
    function sweatshirt(){
        $param = array("false","true","false","false","true","true","true","true","true",0,100,"true","true","false","true","true","");
        $this->pageTitle = "Sweat-shirts";
        $this->filter($param);
    }
    function promotion(){
        $param = array("true","true","true","true","true","true","true","true","true",0,100,"true","true","true","true","true","");
        $this->pageTitle = "Promotions";
        $this->filter($param);
    }

    function search(array $param){
        if (count($param) && isset($param[0])){
            $param = array("true","true","true","true","true","true","true","true","true",0,100,"true","true","true","true","true",$param[0]);
            $this->filter($param);
        }else{
            require "frontend/404.php";die();
        }
        
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
        $longueur = 17;

        // Récupérer nom de page
        $pageTitle = $this->pageTitle;

        
        if(count($param)==$longueur){
            $categorie = array("t-shirt","sweat-short","sports-wear","accessoire");
            $couleur = array('red','green','blue','white','black');
            $categorieChoisi = array();
            $couleurChoisi = array();
            $promo = false;
            if($param[13]=="true"){
                $promo = true;
            }

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
            $dao = new \backend\DAO\DBArticle();
            $mesArticles = $dao->getArticleByCondition($categorieChoisi,$couleurChoisi,array($param[9],$param[10]),$genre,false,2);
            if ($param[16] != ""){
                $mesArticles = $this->filiterbyname($param[16], $mesArticles);
            }
            
            
            require "frontend/all-products/index.php";



        }else{
            require "frontend/404.php";
        }
    }

    private function filiterbyname(string $search,array $products){

        // Calculer les coefficients de ressemblance pour chaque produit

        $n = count($products)-1;
        $i = 0;
        $listCoefficient=[];
        while ($i <= $n-1){
            $j = $i+1;
            while ($j <= $n){
                if ($listCoefficient[$i] != null){
                    $coefi = $listCoefficient[$i];
                }else{
                    $coefi = $this->calculerCoefficientRessemblance($search, ($products[$i])->getNom());
                    $listCoefficient[$i] = $coefi;
                }

                if ($listCoefficient[$j] != null){
                    $coefj = $listCoefficient[$j];
                }else{
                    $coefj = $this->calculerCoefficientRessemblance($search, $products[$j]->getNom());
                    $listCoefficient[$j] = $coefj;
                }


                if ($coefi < $coefj){
                    $valtemp = $products[$i];
                    $products[$i] = $products[$j];
                    $products[$j] = $valtemp;

                    $valtemp2 = $listCoefficient[$i];
                    $listCoefficient[$i] = $listCoefficient[$j];
                    $listCoefficient[$j] = $valtemp2;
                }
                $j++;
            }
            $i++;
            if ($listCoefficient[$i-1] < 0.25){
                return array_slice($products,0,$i-1);
            }
            
        }
        return $products;
    }

    private function calculerCoefficientRessemblance(string $search, string $productname){
        // Vous pouvez ajuster ces poids en fonction de l'importance de chaque critère
        $poidsSimilariteJaccard = 1.0;
        $poidsSimilariteLevenshtein = 0.5;

        //split les chène de carracter
        $searchSplit = str_split($search);
        $productnameSplit = str_split($productname);

        // Calculer la similarité de Jaccard
        $intersection = count(array_intersect($searchSplit, $productnameSplit));
        $union = count(array_unique(array_merge($searchSplit, $productnameSplit)));
        $similariteJaccard = $union > 0 ? $intersection / $union : 0;
    
        // Calculer la similarité de Levenshtein
        $similariteLevenshtein = 1 - levenshtein($search, $productname) / max(strlen($search), strlen($productname));
    
        // Calculer le coefficient de ressemblance pondéré
        $coefficientRessemblance = ($poidsSimilariteJaccard * $similariteJaccard) + ($poidsSimilariteLevenshtein * $similariteLevenshtein);
    
        return $coefficientRessemblance;
    }
}

?>