<?php
namespace controller;

class article{

    private \backend\DAO\DAOInterface $dao;


    function index(){
        echo "Erreur 404 - Page introuvable";
        // TODO : Rediriger vers une page 404
    }

    function visuel($a){
        if(count($a)==1){
            $id = intval($a[0]);
            $this->dao = new \backend\DAO\DBArticle();
            $articleActual = $this->dao::getById($id);
            require "frontend/article/index.php";
        }
        
    }
}

?>