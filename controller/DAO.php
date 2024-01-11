<?php

namespace controller;

//use \backend\DAO\DBArticle;

class DAO{

    private \backend\DAO\DAOInterface $dao;

    function index(){
        
        require "frontend/DAO/DBArticle.php";
    }

    function DAOArticle(){
        echo "AzAAA";
        $this->dao = new \backend\DAO\DBArticle();
        var_dump($this->dao);
        echo "AzAA2A";
        var_dump($this->dao);
        $this->dao->getall();
        echo "AAAA";
        require "frontend/DAO/DBArticle.php";
        

         
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
        echo "<br>";
        if (empty($params[2])){
            call_user_func([$this->dao, $params[1]]);

        echo "<br>";
        echo "use methode : " . $params[1];
        } else {
            $arguments = [$params[2]];

            echo "<br>";
            echo "use methode : " . $params[2];
            $this->dao->getById(1);
            call_user_func([$this->dao, $params[1]],$arguments[0]);
               
        }

    
        //require "frontend/DAO/". $params[0] .".php";
    }

    function entity($className, $methodName, $params = array()){
        $this->dao = new $className();
        call_user_func_array(array($this->dao, $methodName), $params[0]);
        
    }
}