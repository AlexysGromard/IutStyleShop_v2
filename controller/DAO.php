<?php

namespace controller;

class DAO{

class DAO{

    private \backend\DAO\DAOInterface $dao;

    function index(){
        require "frontend/DAO/DBArticle.php";
    }

    function index($className, $methodName, $params = array()) {
        // Créez une instance de la classe DAO
        // $this->dao = new $className();
    
        
        // // Vérifiez s'il y a des paramètres provenant du routeur
        // if (!empty($params)) {
        //     // Appel de la méthode avec les paramètres provenant du routeur
        //     $result = call_user_func_array(array($this->dao, $methodName), $params);
        // } 
        // // }elif (false == empty($params)) {
        // //     // Aucun paramètre provenant du routeur, appeler la méthode sans paramètres
        // //     $result = call_user_func(array($this->dao, $methodName));
        // // }
        
        echo "jbefihbfejzbfjbezbjfkjebfkjeb";
        //require "frontend/".$className.".php";
    }
}
    
