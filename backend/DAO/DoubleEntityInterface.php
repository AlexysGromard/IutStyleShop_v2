<?php

namespace backend\DAO;

Interface DoubleEntityInterface extends DAOInterface
{

    /**
     * Ajoute une entité avec un élément supplémentaire
     * 
     * @param UserEntity $entity
     * @param string $element
     * @return void
     */
    public function add($entity, $element);

}
