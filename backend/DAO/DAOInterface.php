<?php

namespace backend\DAO;

Interface DAOInterface
{
    /**
     * update une entité
     * 
     * @param Entity $entity
     * @return void
     */
    public function update($entity);
    
    /**
     * Supprime une entité
     * 
     * @param int $id
     * @return void
     */
    public function delete($id);
    
    /**
     * Donne toutes les entités
     * 
     * @return array
     */
    public function getall();
} 