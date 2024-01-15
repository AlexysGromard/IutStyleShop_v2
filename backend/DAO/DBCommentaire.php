<?php

namespace backend\DAO;


use \backend\entity\CommentaireEntity;
use \backend\entity\ArticleEntity;
use \backend\entity\UserEntity;

class DBCommentaire extends Connexion  implements DAOInterface 
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
            $requete = "call InsertCommentaire(?, ?, ?, ?)";
            $stmt = self::$pdo->prepare($requete);

            $stmt->bindParam(1, $entity->getUser(), \PDO::PARAM_INT);
            $stmt->bindParam(2, $id_article, \PDO::PARAM_INT);
            $stmt->bindParam(3, floatval($entity->getNote()));
            $stmt->bindParam(4, $entity->getCommentaire(), \PDO::PARAM_STR);

            var_dump($entity);
            var_dump($id_article);

            $stmt->execute();
          }  catch (\PDOException $e) {
                // Gérer les erreurs ici, par exemple, loguer l'erreur ou retourner un message d'erreur.
                echo "Erreur d'exécution de la requête : " . $e->getMessage();
            }
    }

    public static function update($entity)
    {
        // $requete = "call UpdateCommentaire(:id, :idArticle, :idUser, :note, :commentaire)";
        // $stmt = self::pdo->prepare($requete);
        // $stmt->execute([
        //     'idArticle' => $entity->getIdArticle(),
        //     'idUser' => $entity->getIdUser(),
        //     'note' => $entity->getNote(),
        //     'commentaire' => $entity->getCommentaire()
        // ]);
    }

    /**
     * Delete un commentaire 
     * 
     * @param CommentaireEntity $entity
     * @param int $id_article
     */
    public static function delete($entity)//, $id_article
    {
        $requete = "DeleteCommentaire(?,?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(2, $id_article, \PDO::PARAM_INT);

        $stmt->execute();

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
            $commentaire = new Commentaire(
                $resultat['ID_User'],
                $resultat['note'],
                $resultat['commentaire']
            );
            
            $array_commentaire[] = $commentaire;
        }
        return  $array_commentaire;
    }

    public static function getById(int $id): ?CommentaireEntity
    {

    }

    /**
     * Donne les commentaires d'un article
     * 
     * @param  $name
     */
    public static function getCommentaireByArticle(ArticleEntity $entity): array
    {
        
        $requete = "CALL GetCommentairesByArticle(?)";
        $stmt = self::$pdo->prepare($requete);

        // Lie les paramètres d'entrée
        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);
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