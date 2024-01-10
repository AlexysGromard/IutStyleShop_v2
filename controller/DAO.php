<?php

namespace controller;

use backend\DAO\DAOInterface;

class DAO
{
    private DAOInterface $dao;

    public function index()
    {
        echo "DAO index";
    }

    function call(array $parametre){
        echo "DAO call";

        // montrer les parametres
        echo "<br>";
        echo "DAO parameters: " . $parametre[0] ;


        // Vérifiez si la classe existe
        if (!class_exists($parametre[0])) {
            echo "<br>";
            echo "Controller class not found: " . $parametre[0] ;
        } else {
            // Créez une instance de la classe spécifiée par $className
            echo "<br>";
            echo "ieoifhhfihezhhoih";
            echo "DAO class created: " . $parametre[0] ;
        //     $this->dao = new $parametre[0]();

        //     // Verifier que le dao implemente l'interface DAOInterface
        //     if (!($this->dao instanceof DAOInterface)) {
        //         echo "<br>";
        //         echo "DAO class not implement DAOInterface: " . $parametre[0] ;
        //     }else{
        //         echo "<br>";
        //         echo "DAO class implement DAOInterface: " . $parametre[0] ;
        //     }

        
        

        // // Vous pouvez ajouter d'autres opérations ici en lien avec l'instance de DAO

        // echo "<br>";
        // echo "DAO method called: " . $parametre[1] ;
        // echo "<br>";
        // echo "DAO method parameters: " . $parametre[2] ;
        // echo "<br>";
        // echo "DAO method parameters: " . $parametre[3] ;
        // echo "<br>";
        // echo "DAO method parameters: " . $parametre[4] ;
        }

        echo "<br>";
        echo "Fin de la classe DAO";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        die();
    
    }


}



?>