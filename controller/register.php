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
        // Générer un jeton CSRF
        $csrfToken = $this->genererTokenCSRF();

        require "frontend/authentication/register.php";

        unset($_SESSION['errors']);
    }

    /*
    * Cette fonction permet de générer un jeton CSRF
    */
    function genererTokenCSRF() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $token = bin2hex(random_bytes(32)); // Générer un jeton aléatoire
        $_SESSION['csrf_token'] = $token; // Stocker le jeton dans la session
        return $token;
    }

    /*
    * Cette fonction permet de vérifier si le jeton CSRF est valide
    */
    function verifierTokenCSRF($token) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
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
        $tokenDuFormulaire = $_POST['csrf_token'];

        // Echapement des caractères spéciaux
        $civility = htmlspecialchars($civility, ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
        $passwordConfirmation = htmlspecialchars($passwordConfirmation, ENT_QUOTES, 'UTF-8');
        $tokenDuFormulaire = htmlspecialchars($tokenDuFormulaire, ENT_QUOTES, 'UTF-8');

        // Vérification taille des données
        if (strlen($civility) > 1 || strlen($lastname) > 64 || strlen($firstname) > 54 || strlen($email) > 255 || strlen($password) > 128 || strlen($passwordConfirmation) > 128) {
            header("Location: /register");
            exit();
        }

        if (!$this->verifierTokenCSRF($tokenDuFormulaire)) {
            // Le jeton CSRF n'est pas valide, traitement de l'erreur ou rejet de la requête
            // Supprimer de la session 
            unset($_SESSION['csrf_token']);
            header("Location: /register");
            exit();
        }

        unset($_SESSION['csrf_token']);


        // Vérification du genre
        if ($civility != "M" && $civility != "W" && $civility != "N") {
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

        // Vérification du mot de passe
        if ($password != $passwordConfirmation) {
            $this->errors['password'] = true;
        } else {
            // Stockage du mot de passe dans la session
            $_SESSION['password'] = $password;
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

        // Vérifier si l'email existe déjà
        $DAOUser = new \backend\DAO\DBUser();
        if ($DAOUser->getByEmail($email) != null) {
            $this->errors['email'] = true;
            $_SESSION['errors'] = $this->errors;

            header("Location: /register");
            exit();
        }
        
        // Supprimer les erreurs
        unset($_SESSION['errors']);

        header("Location: /emailConfirmation");
    }
}
?>