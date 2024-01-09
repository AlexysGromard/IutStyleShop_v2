<?php
namespace controller;

class payment{

    function index(){
        $personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        require "frontend/payment/payment.php";
    }

}

?>