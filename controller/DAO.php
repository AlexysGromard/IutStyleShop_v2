<?php

namespace controller;

class DAO{

    private \backend\DAO\DAOInterface $dao;

    function index(){
        
        require "frontend/DAO/DBArticle.php";
    }

    function get($className, $methodName, $params = array()){
        $this->dao = new $className();
        $result = call_user_func_array(array($this->dao, $methodName), $params[0]);

        require "frontend/DAO".$className.".php";
    }

    function entity($className, $methodName, $params = array()){
        $this->dao = new $className();
        call_user_func_array(array($this->dao, $methodName), $params[0]);
        
    }
}