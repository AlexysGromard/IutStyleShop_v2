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
        $personne = $_SESSION['user'];
        
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