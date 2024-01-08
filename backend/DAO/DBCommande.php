<?php

namespace backend\DAO;

class DBCommande extends Connection implements DAOInterface
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

    public function getById(int $id): ?CommandeEntity
    {
    }


    /**
     * Donne les commandes d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    public function getCommandeByUser(int $id): array
    {
    }

    /**
     * Donne les commandes d'une date
     * 
     * @param string $date
     * @return array
     */
    public function getCommandeByDate(string $date): array
    {
    }

    /**
     * Donne les commandes d'un utilisateur et d'une date
     * 
     * @param int $id
     * @param string $date
     * @return array
     */
    public function getCommandeByUserAndDate(int $id, string $date): array
    {
    }


}