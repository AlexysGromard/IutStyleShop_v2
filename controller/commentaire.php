<?php

namespace controller;


use backend\entity\CommentaireEntity;

class commentaire{

    private \backend\DAO\DAOInterface $dao;

    /**
     * Cette fonction permet d'afficher le formulaire pour ajouter un commentaire
     */
    function index(){
        

    }
    /**
     * charge le formulaire pour un commentaire
     * 
     * @param int $id_article
     */
    function form(array $id_article)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->dao = new \backend\DAO\DBArticle();


            $article = $this->dao::getById($id_article[0]);
    
            if ($article == null) {
                header("Location: /article/visuel/".$id_article[0]);
                exit();
            }
    
            require "frontend/commentaire/commentaire.php";
        } else{
            header("Location: /login");
            exit();
        }

    }

    /**
     * Cette fonction permet d'ajouter un commentaire
     *
     * @param int $id_article
     */
    function addCommentaire(array $id_article){

        if (!isset($id_article[0])){
            header('Location: /');
            exit();
        }

        session_start();
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user']->getId();

            if (!empty($_POST['note'])) {
               
                $commentaire = new CommentaireEntity($_SESSION['user']->getId(), $_POST['note'], htmlspecialchars($_POST['commentaire'])); 
                
                $this->dao = new \backend\DAO\DBCommentaire();



                $this->dao::add($commentaire,intval($id_article[0]));            
        
            }
        }

        header('Location: /article/visuel/'.$id_article[0]);
        exit();
            
            
        




    }

}

?>