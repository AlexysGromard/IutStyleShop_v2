<?php

namespace backend\DAO;

Interface EntityInterface extends DAOInterface
{
    /**
     * Ajoute une entité
     * 
     * @param Entity $entity
     * @return void
     */
    public function add($entity);

}

?>