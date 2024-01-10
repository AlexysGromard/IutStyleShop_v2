<?php

namespace backend\DAO;

Interface DAOInterface
{
    public function add($entity);
    public function update($entity);
    public function delete($id);
    public function getall();
} 