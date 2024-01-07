<?php

namespace backend\DAO;

class DBPanier extends Connexion implements DAOInterface
{
    public function add(PanierEntity $entity)
    {   
        $requete = "call PanierPackage.InsertPanier(:idArticle, :idUser, :taille, :quantite)";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute([
            'idArticle' => $entity->getIdArticle(),
            'idUser' => $entity->getIdUser(),
            'taille' => $entity->getTaille(),
            'quantite' => $entity->getQuantite()
        ]);

    }

    public function update($entity)
    {
        // $requete = "call PanierPackage.UpdatePanier(:id, :idArticle, :idUser, :taille, :quantite)";
    }

    public function delete($id)
    {
    }

    public function deleteArticle($id)
    {
        $requete = "call PanierPackage.DeleteOneArticlePanier(:iduser, :idarticle)";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute([
            'iduser' => $_SESSION['id'],
            'idarticle' => $id
        ]);
    }

    public function getall()
    {
    }

    public function getById(int $id): ?PanierEntity
    {
    }


    /**
     * Donne le panier d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    public function getPanierByUser(int $id): array
    {
    }



    
}