<?php

namespace backend\DAO;

require_once 'backend/config/config.php'; //TODO : A corriger avec MVC

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
        // $this->connexion->exec($exec);
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
    # attribut de connexion
    private \PDO $pdo;

    public function __construct()
    {
        try{
            $pdo = SPDO::getInstance(
                DB_CONFIG["type"].':host='.DB_CONFIG["host"].';port='.DB_CONFIG["port"].';dbname='.DB_CONFIG["dbname"],
                DB_CONFIG["username"],
                DB_CONFIG["password"],
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    \PDO::ATTR_TIMEOUT => 3600,
                ]
                )->getConnexion();
            return $pdo;
        } catch (\PDOException $e) {
            echo "<script>showErrorPopup('Erreur de connexion','Une erreur est survenue lors de la connexion à la base de données.')</script>";
            die();
        }
    }
}
?>