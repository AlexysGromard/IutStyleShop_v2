<?php

namespace backend\DAO;

use Exception;

require_once 'backend/config/config.php'; 

/**
 * Class Connexion
 * @package backend\DAO
 * Connexion à la base de données
 */
class Connexion
{
    # attribut de connexion
    static protected \PDO $pdo;

    public function __construct()
    {
        
        try{            
            $pdoinstance = \system\SPDO::getInstance(
                DB_CONFIG["type"].':host='.DB_CONFIG["host"].';port='.DB_CONFIG["port"].';dbname='.DB_CONFIG["dbname"],
                DB_CONFIG["username"],
                DB_CONFIG["password"],
                [
                    \PDO::ATTR_TIMEOUT => 3600,
                ]
                );
            self::$pdo = $pdoinstance->getConnexion();
            
        } catch (\PDOException $e) {
            //echo $e;
            require 'frontend/500.php';
            die();
        }

    }
}
?>