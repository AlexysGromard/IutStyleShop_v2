<?php
// Chargement de la configuration backend (qui gère les variables d'environnement)
require_once 'backend/config/config.php';

// Enregistrer l'autoloader AVANT session_start() pour que les classes en session puissent être désérialisées
spl_autoload_register(function($class) {
    $path=$class;
    if (DIRECTORY_SEPARATOR === '/') {
    $path=str_replace('\\','/',$class);
    }
    
    $include = __DIR__.DIRECTORY_SEPARATOR.$path.'.php';
    
    //echo "REQUIRE : ".$include."<br>";
    if (file_exists($include)){
        require $include;
    }else{
        // Erreur 404
        require "frontend/404.php";
        die();
    }
});

// Démarrer la session APRÈS l'autoloader pour que les objets en session puissent être désérialisés
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$router = new system\Router();
$router->route();

?>