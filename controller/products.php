<?php
namespace controller;

class products{

    function index(){
        require "frontend/all-products/index.php";
    }

    function filter($param){
        //TODO
        require "frontend/all-products/index.php";
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

        // Rediriger vers la page des produits
        require "frontend/all-products/index.php";
    }

}

?>