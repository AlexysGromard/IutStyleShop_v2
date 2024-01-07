<?php

namespace backend\DAO;



class SPDO
{
    private \PDO $connexion;
    private static ?SPDO $PDOInstance=null;

    private function __construct(string $dsn,
                                  ?string $username = null,
                                  ?string $password = null,
                                  ?array $options = null,
                                  ?string $exec = null)
    {
        $this->connexion = new \PDO($dsn,$username , $password, $options);
        $this->connexion->exec($exec);
    }

    public static function getInstance(string $dsn,
                                       ?string $username = null,
                                       ?string $password = null,
                                       ?array $options = null,
                                       ?string $exec = null):SPDO
    {
        if(!self::$PDOInstance)
        {
            self::$PDOInstance = new SPDO($dsn,$username , $password, $options, $exec);
        }
        return self::$PDOInstance;
    }

    public function getConnexion():\PDO{
        return $this->connexion;
    }
}


/**
 * Class Connexion
 * @package backend\DAO
 * Connexion à la base de données
 */
class Connexion
{
    private $pdo;

    public function __construct()
    {
        //'mysql:host=localhost;dbname=blog', 'root', ''
        $this->pdo = new SPDO::getInstance('mysql:host=localhost;dbname=blog', 'root', '', [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"])->getConnexion();
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
}

?>