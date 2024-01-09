<?php
namespace controller;


class user{

    function client_space(array $param){
        if (count($param) != 1 || !in_array($param[0], array("informations","commandes","adresse","parametres"))){
            echo "Erreur";die();
        }

        $personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
        switch ($param[0]) {
            case "informations":
                $actionSelect = "Mes informations";
                break;
            case "commandes":
                $actionSelect = "Mes commandes";
                break;
            case "adresse":
                $actionSelect = "Mon adresse";
                break;
            case "parametres":
                $actionSelect = "Mes paramètres";
        }
        
    
        require "frontend/userSpace/client.php";
    }


    function admin_space(array $param){

        //vérifier que c'est bien un admin
        //todo

        if (count($param) < 1 || !in_array($param[0], array("utilisateurs","commandes","articles","avis","codes_promotionnel"))){
            echo "Erreur";die();
        }

        $personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
        switch ($param[0]) {
            case "utilisateurs":
                $actionSelect = "Base de données utilisateurs";
                break;
            case "commandes":
                $actionSelect = "Base de données commandes";
                break;
            case "articles":
                $actionSelect = "Base de données articles";
                break;
            case "avis":
                $actionSelect = "Base de données avis";
                break;
            case "codes_promotionnel":
                $actionSelect = "Base de données codes promotionnel";
        }
        
        $array_user = array($personne,$personne,$personne,$personne);


        //sicommande
        $commande = new \backend\Commande(100,2,"06/01/2024 13:07","Expédié",50.0);
        $array_commandes = array($commande,$commande,$commande);
        
        $numcommand = null;
        if (isset($param[1]) && is_numeric($param[1])){
            //vérifier que la command exist
            $numcommande = $param[1];//modifiable
            $commande = new \backend\Commande(100,2,"06/01/2024 13:07","Expédié",50.0);
        }

        //si article
        $article = null;
        if (isset($param[1])){
            if (is_numeric($param[1])){
                //vérifier que la command exist
                //$numArticle = $param[1];
                $article = new \backend\Article("T-shirt Rouge","T-shirt","H","/image/truc.png",4.9,3,"compacte et durable","Rouge",true, 23.99 ,0); //modifier
            }else if ($param[1] == "nouvelArticle"){
                $article = "nouvelArticle";
            }
    
        }
        
    

        require "frontend/userSpace/admin.php";
    }
}

?>