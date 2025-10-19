<?php
    // Chargement des variables d'environnement depuis .env si pas dans Docker
    if (file_exists(__DIR__ . '/../../.env')) {
        $lines = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                if (!array_key_exists($name, $_ENV)) {
                    $_ENV[$name] = $value;
                    putenv("$name=$value");
                }
            }
        }
    }

    // Fonction pour récupérer les variables d'environnement
    function getDbConfig() {
        return array(
            "dbname" => getenv('DB_NAME') ?: "DB_IutStyleShop",
            "username" => getenv('DB_USER') ?: "sql",
            "password" => getenv('DB_PASSWORD') ?: "sql",
            "host" => getenv('DB_HOST') ?: "localhost",
            "type" => "mysql",
            "port" => getenv('DB_PORT') ?: "3306" 
        );
    }

    function getMailConfig() {
        return array(
            "email" => getenv('MAIL_EMAIL') ?: "EMAIL",
            "password" => getenv('MAIL_PASSWORD') ?: "PASSWORD",
        );
    }

    // Définir les constantes avec les valeurs
    define('DB_CONFIG', getDbConfig());
    define('MAIL_CONFIG', getMailConfig());
?>