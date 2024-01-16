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
            //DAO Article
            $dao = new \backend\DAO\DBArticle();
            $articleActual = $dao::getById($id);
            $articlesSimilaire = $dao::getArticleByCategorieAndGenre($articleActual->getCategory(),$articleActual->getGenre());
            if(count($articlesSimilaire)>4){
                $articlesSimilaire = array_slice($articlesSimilaire, 0, 4);

            }
            //DAO Commentaire
            $daoCom = new \backend\DAO\DBCommentaire();
            $comments = $daoCom::getCommentaireByIdArticle($articleActual->getId());
            //DAO User
            $dao = new \backend\DAO\DBUser();
            $userCommentNames = array();
            foreach($comments as $comment){
                if($comment->getUser()){
                    $userCommentNames[] = $dao::getNomPrenomById($comment->getUser());
                }

            }


            
            require "frontend/article/index.php";
        }
        
    }
}

?>