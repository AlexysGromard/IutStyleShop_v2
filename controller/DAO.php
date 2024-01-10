<?php

namespace controller;

<<<<<<< HEAD
use backend\DAO\DAOInterface;
=======
//use \backend\DAO\DBArticle;

class DAO{
>>>>>>> refs/remotes/origin/DAO

class DAO
{
    private DAOInterface $dao;

<<<<<<< HEAD
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
=======
    function index(){
        
        require "frontend/DAO/DBArticle.php";
    }

    function DAOArticle(){
               
        require "frontend/DAO/DBArticle.php";
        $this->dao = new \backend\DAO\DBArticle();
        
        var_dump($this->dao->getById(3));
        

        
    }

    function call(array $params){
        echo "DAO Call";
        echo "<br>";

        echo "<br>";

        
        
        $res =  "\backend\DAO\\" . $params[0];
        $this->dao = new $res();
        var_dump($this);

        echo "<br>";
        echo "DAO class created : " . $params[0];
        echo "<br>";

        call_user_func([$this->dao, $params[1]]);
        echo "<br>";
        echo "use methode : " . $params[1];
    
        require "frontend/DAO/". $params[0] .".php";
    }
>>>>>>> refs/remotes/origin/DAO

        
        

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