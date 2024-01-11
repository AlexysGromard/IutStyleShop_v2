<?php

namespace controller;

use backend\entity\ArticleEntity;

//use \backend\DAO\DBArticle;

class DAO{

    private \backend\DAO\DAOInterface $dao;

    function index(){
        
        require "frontend/DAO/DBArticle.php";
    }

    function DAOArticle(){
        $this->dao = new \backend\DAO\DBArticle();
        $article = $this->dao->addVetement("Baobab","t-shirt","M","bleue","enorme baobab bleue",210,10,true,array(5,6,3,2,8),array("Test.png","test2.png"));
        var_dump($article);
        

         
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
            // $arguments = [$params[2]];

            // echo "<br>";
            // echo "use methode : " . $params[2];
            // $this->dao->getById(1);
            // call_user_func([$this->dao, $params[1]],$arguments[0]);

            $this->dao->add($params[2],$params[3]);
               
        }

    
        //require "frontend/DAO/". $params[0] .".php";
    }

    function entity($className, $methodName, $params = array()){
        $this->dao = new $className();
        call_user_func_array(array($this->dao, $methodName), $params[0]);
        
    }
}