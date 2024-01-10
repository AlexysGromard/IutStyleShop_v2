<?php

namespace backend\DAO;

Interface DAOInterface
{
    public function update($entity);
    public function delete($id);
    public function getall();
} 