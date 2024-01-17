<?php

namespace backend\DAO;

use \backend\DAO\DBArticle;
use \backend\DAO\DBUser;
use \backend\entity\CommentaireEntity;
use \backend\entity\ArticleEntity;
use \backend\entity\UserEntity;

class DBCommentaire extends Connexion
{

    /**
     * Ajoute un commentaire dans la base
     * 
     * @param CommentaireEntity $entity
     * @param int $id_article
     */
    public static function add(CommentaireEntity $entity,int $id_article)
    {
        try {
            $dbarticle = new DBArticle();
            $dbuser = new DBUser();

            $id_user = $entity->getUser(); //Envoie l'id de l'utilisateur
            $note = floatval($entity->getNote()); //Envoie la note donné par l'utilisateur
            $commentaire = $entity->getCommentaire(); // Envoie du commentaire (message) donné par l'utilisateur
            assert($note>0 && $note<=5, "La note doit appartenir à l'ensemble {1,2,3,4,5}");
            assert($id_article>0 && $dbarticle::getById($id_article)!=null); // l'id de l'article doit être > 0 et être présent dans la table Article
            assert(is_numeric($id_user) && $id_user>0 && $dbuser::getById($id_user)!=null); // l'id de l'user doit être > 0 et être présent dans la table User

            $requete = "call InsertCommentaire(?, ?, ?, ?)";
            $stmt = self::$pdo->prepare($requete);

            $stmt->bindParam(1, $id_user, \PDO::PARAM_INT);
            $stmt->bindParam(2, $id_article, \PDO::PARAM_INT);
            $stmt->bindParam(3, $note);
            $stmt->bindParam(4, $commentaire, \PDO::PARAM_STR);

            $stmt->execute();
          }  catch (\PDOException $e) {
                // Gérer les erreurs ici, par exemple, loguer l'erreur ou retourner un message d'erreur.
                echo "Erreur d'exécution de la requête : " . $e->getMessage();
            }
    }


    /**
     * Delete un commentaire 
     * 
     * @param CommentaireEntity $entity
     * @param int $id_article
     */
    public static function delete($entity,$article)//, $id_article
    {

        $requete = "CALL DeleteCommentaire(?,?)";
        $stmt = self::$pdo->prepare($requete);

        $idUser = $entity->getUser();
        $idArticle = $article->getId();

        $stmt->bindParam(1, $idUser , \PDO::PARAM_INT);
        $stmt->bindParam(2, $idArticle, \PDO::PARAM_INT);


        $stmt->execute();

        
        echo "<pre>";
        var_dump($entity);
        var_dump($article);
        echo "</pre>";

    }

    public static function getall() : array
    {
        $requete = "CALL GetCommentaires()";
        $stmt = self::$pdo->prepare($requete);

        $stmt->execute();

        $resultats = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $array_commentaire = array() ;
        // Parcourir les résultats et créer des objets Commentaire
        foreach ($resultats as $resultat) {
            $commentaire = new CommentaireEntity(
                $resultat['ID_User'],
                $resultat['note'],
                $resultat['commentaire']
            );
            
            $array_commentaire[] = $commentaire;
        }
        return  $array_commentaire;
    }

    public static function getById(int $id_user, int $id_article): ?CommentaireEntity{
        $requete = "CALL GetCommentairesByIds(?,?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1,$id_user,\PDO::PARAM_INT);
        $stmt->bindParam(2,$id_article,\PDO::PARAM_INT);

        $stmt->execute();

        $resultats = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($resultats) != 1){
            return null;
        }

        $commentaire = new CommentaireEntity(
            $resultats[0]['ID_User'],
            $resultats[0]['note'],
            $resultats[0]['commentaire']
        );
            
        
        return  $commentaire;
    }
    

    /**
     * Donne les commentaires d'un article
     * 
     * @param  $name
     */
    public static function getCommentaireByIdArticle(int $id_article): array
    {
        
        $requete = "CALL GetCommentairesByArticle(?)";
        $stmt = self::$pdo->prepare($requete);

        // Lie les paramètres d'entrée
        $stmt->bindParam(1, $id_article, \PDO::PARAM_INT);
        $stmt->execute();

        $resultats = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $array_commentaire = array() ;
        // Parcourir les résultats et créer des objets Commentaire
        foreach ($resultats as $resultat) {
            $commentaire = new CommentaireEntity(
                $resultat['ID_User'],
                $resultat['note'],
                $resultat['commentaire']
            );
            $array_commentaire[] = $commentaire;
        }

        return  $array_commentaire;
    }

    
}