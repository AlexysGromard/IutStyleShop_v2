<?php
namespace controller;

include_once "backend/DAO/DBUser.php";


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

        // Vérifier que l'utilisateur existe dans la base de données
        if ($DAOUser->getById($id) == null || $_SESSION['user']->getEmail() != $DAOUser->getById($id)->getEmail()){
            // Décconnecter l'utilisateur
            $this->logout();
        }
        
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

        echo "<pre>";
        var_dump($personne);
        echo "</pre>";

        if ($personne->getRole()!="admin"){
            require "frontend/404.php";die();
        }


        if (count($param) < 1 || !in_array($param[0], array("utilisateurs","commandes","articles","avis","codes_promotionnel"))){
            require "frontend/404.php";die();
        }

        //$personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
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

        //si codes promo
        $codePromo = null;
        if (isset($param[1])){
            if (is_numeric($param[1])){
                //mettre un code promo
                //$codePromo =
            }else if ($param[1] == "nouveauCodePromotionnel"){
                $codePromo = "nouveauCodePromotionnel";
            }
        }
    

        require "frontend/dashboard/admin.php";
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

    /*
    * Fonction qui permet de mettre à jour les informations de l'utilisateur
    * Elle va récupérer les informations du formulaire et les mettre à jour dans la base de données
    */
    function updateUserInformations(){
        $civilite = $_POST['civility'];
        $nom = $_POST['lastname'];
        $prenom = $_POST['firstname'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];

        // Echaper les données
        $civilite = htmlspecialchars($civilite, ENT_QUOTES, 'UTF-8');
        $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');
        $mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
        $tel = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');

        // Récupérer l'id de l'utilisateur
        session_start();
        $id = $_SESSION['user']->getId();

        // Mettre à jour les informations de l'utilisateur dans variables de session
        $_SESSION['user']->setGenre($civilite);
        $_SESSION['user']->setNom($nom);
        $_SESSION['user']->setPrenom($prenom);
        $_SESSION['user']->setEmail($mail);
        $_SESSION['user']->setTelephone($tel);

        // Mettre à jour les informations de l'utilisateur dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $DAOUser->update($_SESSION['user']);

        // Redirection vers la page d'informations
        header("Location: /user/dashboard/informations");
    }

    /*
    * Fonction qui permet de mettre à jour l'adresse de l'utilisateur
    * Elle va récupérer les informations du formulaire et les mettre à jour dans la base de données
    */
    function updateUserAddress(){
        $address = $_POST['address'];
        $code = $_POST['code'];
        $additional_address = $_POST['additional-address'];
        $city = $_POST['city'];

        // Echaper les données
        $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
        $code = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
        if ($code == "" || !ctype_digit($code)){
            $code = null;
        } else {
            $code = intval($code);
        }
        $additional_address = htmlspecialchars($additional_address, ENT_QUOTES, 'UTF-8');
        $city = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');

        // Récupérer l'id de l'utilisateur
        session_start();
        $id = $_SESSION['user']->getId();

        // Mettre à jour les informations de l'utilisateur dans variables de session
        $_SESSION['user']->setAdresse($address);
        $_SESSION['user']->setCodePostal($code);
        $_SESSION['user']->setComplementAdresse($additional_address);
        $_SESSION['user']->setVille($city);

        // Mettre à jour les informations de l'utilisateur dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $DAOUser->update($_SESSION['user']);

        // Redirection vers la page d'adresse
        header("Location: /user/dashboard/adresse");
    }
}

?>