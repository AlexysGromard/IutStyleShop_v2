<?php
namespace controller;

class article{

    function index(){
        echo "il n'y a pas d'index";
    }

    function visuel($a){
        //use backend\Article;
        $p1 = new \backend\Article("T-shirt Rouge","T-shirt","H","/image/truc.png",4.9,3,"compacte et durable","Rouge",true, 23.99 ,0);
        //$p2 = new \backend\Article("Pantalon Vert","Bas","H","/image/truc2.png",2.5,2,"compacte et durable","Vert",true,20.99,1);
        //$p3 = new \backend\Article("Tase","Accessoire","N","/image/truc3.png",4.0,1,"durable","Blanch",true,2.0,2);
        //
        $articleActual = $p1;
        require "frontend/article/index.php";
    }
}

?>