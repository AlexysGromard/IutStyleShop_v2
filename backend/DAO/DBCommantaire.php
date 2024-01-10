<?php

namespace backend\DAO;

class DBCommantaire extends Connexion  implements DAOInterface 
{

    public function add(CommantaireEntity $entity)
    {
        $requete = "call CommantairePackage.InsertCommentaire(:idArticle, :idUser, :note, :commentaire)";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute([
            'idArticle' => $entity->getIdArticle(),
            'idUser' => $entity->getIdUser(),
            'note' => $entity->getNote(),
            'commentaire' => $entity->getCommentaire()
        ]);
    }

    public function update(CommantaireEntity $entity)
    {
        $requete = "call CommantairePackage.UpdateCommentaire(:id, :idArticle, :idUser, :note, :commentaire)";
        $stmt = $this->pdo->prepare($requete);
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
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function getall() : array
    {
    }

    public function getById(int $id): ?CommantaireEntity
    {
    }

    public function getCommantaireByArticle(int $id): array
    {
    }

    public function getCommantaireByUser(int $id): array
    {
    }

    
}