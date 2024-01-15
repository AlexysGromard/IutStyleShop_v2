<?php
namespace controller;

include "backend/DAO/DBUser.php";

class login {

    public $errors = array(
        "email" => false,
        "password" => false
    );

    function index(){
        session_start();
        if (isset($_SESSION['user'])){
            header("Location: /user/dashboard/informations");
        } else {
            // Générer un jeton CSRF
            $csrfToken = $this->genererTokenCSRF();

            require "frontend/authentication/login.php";

            unset($_SESSION['errors']);
        }
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
    * Cette fonction permet de vérifier existe dans la base de données
    */
    function loginCheck(){
        session_start();

        // Récupération des données
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tokenDuFormulaire = $_POST['csrf_token'];

        // Echapement des caractères spéciaux
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
        $tokenDuFormulaire = htmlspecialchars($tokenDuFormulaire, ENT_QUOTES, 'UTF-8');

        if (!$this->verifierTokenCSRF($tokenDuFormulaire)) {
            // Le jeton CSRF n'est pas valide, traitement de l'erreur ou rejet de la requête
            unset($_SESSION['csrf_token']);
            header("Location: /login");
            exit();
        }
        unset($_SESSION['csrf_token']);

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

        // Vérifier qu'il existe dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $user = $DAOUser->checkUser($email, $password);

        // Si il n'existe pas
        if (empty($user)) {
            // Indiquer erreur mot de passe
            $this->errors['password'] = true;
            $_SESSION['errors'] = $this->errors;
            // Rediriger vers la page de connexion
            header("Location: /login");
        } else {
            // Si il existe
            // Stocker l'utilisateur dans la session
            $user->saveUserSession();
            
            // Supprimer erreurs
            unset($_SESSION['errors']);

            // Rediriger vers la page d'accueil
            header("Location: /user/dashboard/informations");
        }
    }

}
?>
