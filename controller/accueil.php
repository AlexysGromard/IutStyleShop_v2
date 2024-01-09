<?php
namespace controller;

class accueil{

    function index(){
        session_start();
        // Supprimer les variables de session
        if (isset($_SESSION['email'])){
            unset($_SESSION['email']);
        }
        if (isset($_SESSION['civility'])){
            unset($_SESSION['civility']);
        }
        if (isset($_SESSION['lastname'])){
            unset($_SESSION['lastname']);
        }
        if (isset($_SESSION['firstname'])){
            unset($_SESSION['firstname']);
        }
        // Fermer la session
        session_write_close();

        require "frontend/index.php";
    }

}

?>