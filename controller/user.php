<?php
namespace controller;

class user{

    function user_space(array $param){
        if (count($param) != 1 || !in_array($param[0], array("informations","commandes","adresse","parametres"))){
            echo "Erreur";die();
        }

        $valueSelected = $param[0];

        require "frontend/userSpace/index.php";
    }

}

?>