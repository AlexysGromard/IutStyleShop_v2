<?php

namespace backend\DAO;

Interface DAOInterface
{
    public static function update($entity);
    public static function delete($entity);
    public static function getall();
} 