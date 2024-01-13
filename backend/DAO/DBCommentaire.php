<?php

namespace backend\DAO;

class DBCommentaire extends Connexion  implements EntityInterface 
{

    public function add($entity)
    {
        $requete = "call CommantairePackage.InsertCommentaire(:idArticle, :idUser, :note, :commentaire)";
        $stmt = self::pdo->prepare($requete);
        $stmt->execute([
            'idArticle' => $entity->getIdArticle(),
            'idUser' => $entity->getIdUser(),
            'note' => $entity->getNote(),
            'commentaire' => $entity->getCommentaire()
        ]);
    }

    public function update($entity)
    {
        $requete = "call CommantairePackage.UpdateCommentaire(:id, :idArticle, :idUser, :note, :commentaire)";
        $stmt = self::pdo->prepare($requete);
        $stmt->execute([
            'idArticle' => $entity->getIdArticle(),
            'idUser' => $entity->getIdUser(),
            'note' => $entity->getNote(),
            'commentaire' => $entity->getCommentaire()
        ]);
    }

    public function delete($id)
    {
        $requete = "call CommantairePackage.DeleteCommentaire(:id)";
        $stmt = self::pdo->prepare($requete);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function getall() : array
    {
    }

    public function getById(int $id): ?\backend\entity\CommentaireEntity
    {
    }

    public function getCommentaireByArticle(int $id): array
    {
    }

    public function getCommentaireByUser(int $id): array
    {
    }

    
}