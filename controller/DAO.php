<?php

class DAO(){

    private \Backend\DAO\DAOInterface $dao;



    function get($className, $methodName, $params = array()){
        $this->dao = new $className();
        $result = call_user_func_array(array($this->dao, $methodName), $params[0]);

        require "frontend/".$className.".php";
    }

    function entity($className, $methodName, $params = array()){
        $this->dao = new $className();
        call_user_func_array(array($this->dao, $methodName), $params[0]);
        
    }
}