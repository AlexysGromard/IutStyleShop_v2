<?php

namespace backend\DAO;


use \backend\entity\CommentaireEntity;
use \backend\entity\ArticleEntity;
use \backend\entity\UserEntity;

class DBCommentaire extends Connexion  implements EntityInterface 
{

    public function add($entity)
    {
        $requete = "call InsertCommentaire(:idUser, :idArticle, :note, :commentaire)";
        $stmt = self::pdo->prepare($requete);
        $stmt->execute([
            'idUser' => $entity->getIdUser(),
            'idArticle' => $entity->getIdArticle(),
            'note' => $entity->getNote(),
            'commentaire' => $entity->getCommentaire()
        ]);
    }

    public function update($entity)
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

    public function delete($entity)
    {
        $requete = "DeleteCommentaire(:id)";
        $stmt = self::pdo->prepare($requete);
        $stmt->execute([
            'id' => $entity->getId()
        ]);

    }

    public function getall() : array
    {
    }

    public function getById(int $id): ?CommentaireEntity
    {

    }

    /**
     * Donne les commentaires d'un article
     * 
     * @param  $name
     */
    public function getCommentaireByArticle(ArticleEntity $entity): array
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
            $commentaire = new Commentaire(
                $resultat['ID_User'],
                $resultat['note'],
                $resultat['commentaire']
            );
            
            $array_commentaire[] = $commentaire;
        }
        return  $array_commentaire;
    }

    /**
    * Donne les commentaire qu'un User a realiser 
    *
    * @param UserEntity $entity
    * @return CommentaireEntity|null
    */
    // public function getCommentaireByUser(UserEntity $entity): array
    // {
    //     $requete = "CALL GetCommentairesByArticle(?)";
    //     $stmt = self::$pdo->prepare($requete);

    //     // Lie les paramètres d'entrée
    //     $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);
    //     $stmt->execute();

    //     $resultats = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     $array_commentaire = array() ;
    //     // Parcourir les résultats et créer des objets Commentaire
    //     foreach ($resultats as $resultat) {
    //         $commentaire = new Commentaire(
    //             $resultat['ID_User'],
    //             $resultat['note'],
    //             $resultat['commentaire']
    //         );
            
    //         $array_commentaire[] = $commentaire;
    //         return  $array_commentaire;
    //     }

    // return null;
    // }
    
}