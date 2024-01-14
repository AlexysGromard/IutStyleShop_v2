<?php

namespace controller;

use backend\entity\ArticleEntity;

//use \backend\DAO\DBArticle;

class DAO{

    private \backend\DAO\DAOInterface $dao;

    function index(){
        
        require "frontend/DAO/DBArticle.php";
        $this->dao = new \backend\DAO\DBArticle();

    }

    function DAOArticle(){
        $this->dao = new \backend\DAO\DBArticle();
        echo "heho";
        $article = $this->dao->addAccessoire("Baobab","M","bleue","enorme baobab bleue",210,10,true,5,array("Test.png","test2.png"));//array(5,6,3,2,8)
        var_dump($article);
        $article->setNom("Pull Bleu");
        $this->dao->update($article);
    }

    function getArticles(){
        $this->dao = new \backend\DAO\DBArticle();
        foreach($this->dao->getArticleByPrix(array(0,18)) as $article){
            echo "<h1>".$article["nom"]." :</h1>".$article["prix"];
        }
    
    }

    function call(array $params){
        echo "DAO Call";
        echo "<br>";

        echo "<br>";

        
        
        $res =  "\backend\DAO\\".$params[0];
        echo "DAO Call";
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