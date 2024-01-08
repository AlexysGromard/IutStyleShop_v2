<?php

namespace backend\DAO;

require_once 'backend/config/config.php';

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
 * Class Connection
 * @package backend\DAO
 * Connection à la base de données
 */
class Connection
{
    public function __construct()
    {
        //'mysql:host=localhost;dbname=blog', 'root', ''
    }

    public function connect() : \PDO{
        try{
            $pdo = SPDO::getInstance(DB_CONFIG["type"].':host='.DB_CONFIG["host"].';dbname='.DB_CONFIG["dbname"], DB_CONFIG["username"], DB_CONFIG["password"], [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"])->getConnexion();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die("Échec de la connexion à la base de données : " . $e->getMessage());
        }
    }
}

?>