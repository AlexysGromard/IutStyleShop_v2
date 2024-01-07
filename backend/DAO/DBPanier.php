<?php

namespace backend\DAO;

class DBPanier extends Connexion implements DAOInterface
{
    public function add($entity)
    {   
    }

    public function update($entity)
    {
    }

    public function delete($id)
    {
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