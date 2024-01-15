<?php

namespace controller;


use backend\entity\CommentaireEntity;

class commentaire{

    private \backend\DAO\DAOInterface $dao;

    /**
     * Cette fonction permet d'afficher le formulaire pour ajouter un commentaire
     */
    function index(){
        require "frontend/commentaire/commentaire.php";

    }

    /**
     * Cette fonction permet d'ajouter un commentaire
     *
     * @param int $id_article
     */
    function addCommentaire(int $id_article){

        

        if (!empty($_POST['note'])) {
            $commentaire = new CommentaireEntity($_SESSION['id'], $_POST['note'], htmlspecialchars($_POST['commentaire'])); 
        
            $this->dao = new \backend\DAO\DBCommentaire();

            $this->dao::add($commentaire,$id_article);

        
        
        }
        



        Location('Location: /article/visuel/'.$id_article);
        die();
    }

}

?>