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
        }

        // Si il y a au moins une erreur
        if (in_array(true, $this->errors)) {
            $_SESSION['errors'] = $this->errors;

            header("Location: /login");
            exit();
        }

        // TODO : Vérifier qu'il est dans la base de données.
        // TODO : Si oui, le connecter et le rediriger vers la page client/admin
        // TODO : Supprimer les données de la session
    }

}
?>