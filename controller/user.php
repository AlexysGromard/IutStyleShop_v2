<?php
namespace controller;


class user{

    /*
    * Fonction qui permet d'afficher le dashboard de l'utilisateur
    * @param La page à afficher
    */
    function dashboard(array $param){
        // Redrection vers la page demandée
        if (count($param) != 1 || !in_array($param[0], array("informations","commandes","adresse","parametres"))){
            echo "Erreur";die();
        }

        session_start();
        $DAOUser = new \backend\DAO\DBUser();
        $id = $_SESSION['user']->getId();
        
        $personne = $DAOUser->getById($id);
        
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
        
    
        require "frontend/dashboard/client.php";
    }


    function admin_space(array $param){

        //vérifier que c'est bien un admin
        ////
        
        session_start();
        $DAOUser = new \backend\DAO\DBUser();
        $id = $_SESSION['user']->getId();

        $personne = $DAOUser->getById($id);

        if ($personne->getRole()!="admin"){
            require "frontend/404.php";die();
        }


        if (count($param) < 1 || !in_array($param[0], array("utilisateurs","commandes","articles","avis","codes_promotionnel"))){
            require "frontend/404.php";die();
        }

        switch ($param[0]) {
            case "utilisateurs":
                $actionSelect = "Base de données utilisateurs";
                $array_user = $DAOUser->getall();
                break;
            case "commandes":
                $actionSelect = "Base de données commandes";

                $commande = new \backend\Commande(100,2,"06/01/2024 13:07","Expédié",50.0);
                $array_commandes = array($commande,$commande,$commande);

                $numcommand = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        //TODO : si il existe 
                        //vérifier que la command exist
                        $numcommande = $param[1];//modifiable
                        $commande = new \backend\Commande(100,2,"06/01/2024 13:07","Expédié",50.0);
                    }else{
                        require "frontend/404.php";die();
                    }
                }

                break;
            case "articles":
                $actionSelect = "Base de données articles";

                $article = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        //vérifier que la command exist
                        //$numArticle = $param[1];
                        $article = new \backend\Article("T-shirt Rouge","T-shirt","H","/image/truc.png",4.9,3,"compacte et durable","Rouge",true, 23.99 ,0); //modifier
                    }else if ($param[1] == "nouvelArticle"){
                        $article = "nouvelArticle";
                    }else{
                        require "frontend/404.php";die();
                    }
                }
                break;
            case "avis":
                $actionSelect = "Base de données avis";
                break;
            case "codes_promotionnel":
                $actionSelect = "Base de données codes promotionnel";

                $DAOCodePromo = new \backend\DAO\DBCodePromo();
                $array_code_promo = $DAOCodePromo->getall();

                //si codes promo
                $codePromo = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        
                        //mettre un code promo
                        
                        $codePromo = $DAOCodePromo->getById(intval($param[1]));
                        if ($codePromo == null){
                            require "frontend/404.php";die();
                        }
                        
                    }else if ($param[1] == "nouveauCodePromotionnel"){
                        $codePromo = "nouveauCodePromotionnel";
                    }else{
                        require "frontend/404.php";die();
                    }
                }
        }        


    

        require "frontend/dashboard/admin.php";
    }

    function delUser(array $param){
        session_start();
        $DAOUser = new \backend\DAO\DBUser();
        $id = $_SESSION['user']->getId();

        $personne = $DAOUser->getById($id);

        if ($personne->getRole()!="admin"){
            require "frontend/404.php";die();
        }
        
        if (count($param) != 1 || !is_numeric($param[0])){
            require "frontend/404.php";die();
        }else if ($param[0] == 1){
            header("Location: /user/admin_space/utilisateurs");die();
        }
        

        
        $usertodel = $DAOUser->getById($param[0]);
        
        if ($usertodel != null){
            
            $DAOUser->delete($usertodel);
            var_dump($usertodel);
        }
        
        
        header("Location: /user/admin_space/utilisateurs");

    }

    /*
    * Fonction qui permet de valider la déconnexion
    * Elle va supprimer le USER de la session et le rediriger vers la page d'accueil
    */
    function logout(){
        session_start();
        // Supprimer le USER de la session
        unset($_SESSION['user']);
        header("Location: /");
    }
}

?>