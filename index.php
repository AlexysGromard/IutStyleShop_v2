<?php
require 'database/config.inc.php';

spl_autoload_register(function($class) {
    $path=$class;
    if (DIRECTORY_SEPARATOR === '/') {
    $path=str_replace('\\','/',$class);
    }
    
    $include = HOME."..".DIRECTORY_SEPARATOR.$path.'.php';
    
    echo "REQUIRE : ".$include."<br>";
    if (file_exists($include)){
        require $include;
    }else{
        // Erreur 404
        require "frontend/404.php";
        die();
    }
});


$router = new system\Router();
$router->route();

?>