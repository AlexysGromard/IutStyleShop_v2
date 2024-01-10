<?php
namespace controller;


class user{

    /*
    * Fonction qui permet d'afficher le dashboard de l'utilisateur
    * @param La page à afficher
    */
    function dashboard(array $param){
        if (count($param) != 1 || !in_array($param[0], array("informations","commandes","adresse","parametres"))){
            echo "Erreur";die();
        }

        $personne = new \backend\User(1,"Marcel","Claude","M","client");
        
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
        

    
        require "frontend/dashboard/index.php";
    }

    /*
    * Fonction qui permet de valider la déconnexion
    * Elle va détruire la session et revenir à la page d'accueil
    */
    function logout(){
        session_start();
        // Supprimer le USER de la session
        unset($_SESSION['user']);
        header("Location: /");
    }
}

?>