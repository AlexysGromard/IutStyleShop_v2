<?php
namespace controller;

class register {

    public $errors = array(
        "civility" => false,
        "lastname" => false,
        "firstname" => false,
        "email" => false,
        "password" => false,
        "passwordConfirmation" => false
    );

    function index(){
        require "frontend/authentication/register.php";

        unset($_SESSION['errors']);
    }

    /*
    * Cette fonction permet de vérifier que les données sont correctes
    */
    function registerCheck(){
        session_start();

        // Récupération des données
        $civility = $_POST['civility'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password-confirmation'];

        // Echapement des caractères spéciaux
        $civility = htmlspecialchars($civility, ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        
        // Vérification du genre
        if ($civility != "m" && $civility != "w" && $civility != "n") {
            $this->errors['civility'] = true;
        } else {
            // Stockage du genre dans la session
            $_SESSION['civility'] = $civility;
        }

        // Vérification du nom
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            $this->errors['lastname'] = true;
        } else {
            // Stockage du nom dans la session
            $_SESSION['lastname'] = $lastname;
        }

        // Vérification du prénom
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $this->errors['firstname'] = true;
        } else {
            // Stockage du prénom dans la session
            $_SESSION['firstname'] = $firstname;
        }

        // Vérification de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = true;
        } else {
            // Stockage de l'email dans la session
            $_SESSION['email'] = $email;
        }

        // Si l'un des champs est vide
        if (empty($civility) || empty($lastname) || empty($firstname) || empty($email) || empty($password) || empty($passwordConfirmation)) {
            if (empty($civility)) {
                $this->errors['civility'] = true;
            }
            if (empty($lastname)) {
                $this->errors['lastname'] = true;
            }
            if (empty($firstname)) {
                $this->errors['firstname'] = true;
            }
            if (empty($email)) {
                $this->errors['email'] = true;
            }
            if (empty($password)) {
                $this->errors['password'] = true;
            }
            if (empty($passwordConfirmation)) {
                $this->errors['passwordConfirmation'] = true;
            }
        }

        // Si il y a au moins une erreur
        if (in_array(true, $this->errors)) {
            $_SESSION['errors'] = $this->errors;

            header("Location: /register");
            exit();
        }

        header("Location: /emailConfirmation");
    }
}
?>