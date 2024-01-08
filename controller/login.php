<?php
namespace controller;

class login {

    public $errors = array(
        "email" => false,
        "password" => false
    );

    function index(){
        require "frontend/authentication/login.php";

        unset($_SESSION['errors']);
    }

    /*
    * Cette fonction permet de vérifier existe dans la base de données
    */
    function loginCheck(){
        session_start();

        // Récupération des données
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Echapement des caractères spéciaux
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        // Vérification de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = true;
        } else {
            // Stockage de l'email dans la session
            $_SESSION['email'] = $email;
        }


        // Si l'un des champs est vide
        if (empty($email) || empty($password)) {
            if (empty($email)) {
                $this->errors['email'] = true;
            }
            if (empty($password)) {
                $this->errors['password'] = true;
            }
            $_SESSION['errors'] = $this->errors;

            header("Location: /login");
            exit();
        }
    }

}
?>