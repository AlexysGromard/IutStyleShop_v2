<?php
namespace controller;

require_once 'backend/config/config.php';
require_once 'backend/library/PHPMailer-6.9.1/src/PHPMailer.php';
require_once 'backend/library/PHPMailer-6.9.1/src/Exception.php';
require_once 'backend/library/PHPMailer-6.9.1/src/SMTP.php';

include "backend/DAO/DBUser.php";
include "backend/entity/UserEntity.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class emailConfirmation {

    public $errors = array(
        "code" => false
    );

    function index(){
        session_start();

        if (isset($_SESSION['email'])) {
            unset($_SESSION['errors']);

            // Send code
            $this->sendCodeIUT();

            require "frontend/authentication/email-confirmation.php";

        } else {
            header("Location: /register");
            exit();
        }
    }

    /*
    * Cette fonction permet générer un code de confirmation
    */
    private function generateConfirmationCode() {
        return mt_rand(100000, 999999);
    }

    private function sendCodeIUT(){
        // Stockage dans la session
        $_SESSION['confirmationCode'] = "000000";
    }

    private function sendCodeViaSMTP() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $confirmationCode = $this->generateConfirmationCode();
        // Stockage dans la session
        $_SESSION['confirmationCode'] = $confirmationCode;

        // Send email
        $to = $_SESSION['email'];
        $subject = "Confirmation de votre adresse mail";
        $message = "Bonjour,\n\nVoici votre code de confirmation : " . $confirmationCode . "\n\nCordialement,\nL'équipe IutStyleShop";
        
        $mail = new PHPMailer(true);

        try {
            // Paramètres SMTP pour Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_CONFIG["email"];
            $mail->Password   = MAIL_CONFIG["password"];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet = "UTF-8";


            // Destinataire et contenu de l'e-mail
            $mail->setFrom(MAIL_CONFIG["email"], 'IutStyleShop');
            $mail->addAddress($to, 'Nom du destinataire');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Envoi de l'e-mail
            $mail->send();
            echo "<script>showSuccessPopup('Email envoyé','Un email de confirmation vous a été envoyé.')</script>";
        } catch (Exception $e) {
            echo "<script>showErrorPopup('Erreur à l\'envoi de l\'email','Une erreur est survenue lors de l\'envoi de l\'email.".$e->getMessage()."')</script>";
        }
    }

    function checkCode() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Récupération des données
        $code = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'] . $_POST['digit6'];

        // Echapement des caractères spéciaux
        $code = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');

        // Si code fait moins de 6 caractères
        if (strlen($code) < 6) {
            $this->errors['code'] = true;
        }

        // Vérification du code
        if ($code != $_SESSION['confirmationCode']) {
            echo "le code est incorrect";
            echo "vous avez saisi : " . $code . "\n";
            echo "le code est : " . $_SESSION['confirmationCode'] . "\n";
            $this->errors['code'] = true;
        }

        // Redirection si erreur
        if (in_array(true, $this->errors)) {
            $_SESSION['errors'] = $this->errors;

            header("Location: /register");
            exit();
        }

        // Création de l'utilisateur dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $DAOUser->add(
            $_SESSION['email'],
            null,
            $_SESSION['password'],
            $_SESSION['lastname'],
            $_SESSION['firstname'],
            $_SESSION['civility'],
            null,
            null,
            null,
            null
        );

        // Récupération de l'utilisateur dans la base de données
        $user = $DAOUser->getById($DAOUser->getByEmail($_SESSION['email']));
        if ($user == null) {
            echo "<script>showErrorPopup('Erreur lors de la création de l\'utilisateur','Une erreur est survenue lors de la création de l\'utilisateur.')</script>";
            exit();
        }

        // Stocker l'utilisateur dans la session
        $_SESSION['user'] = $user;

        // Supprimer les données de la session
        unset($_SESSION['civility']);
        unset($_SESSION['lastname']);
        unset($_SESSION['firstname']);
        unset($_SESSION['email']);
        unset($_SESSION['confirmationCode']);

        // Si l'utilisateur a un panier non-vide
        if (isset($_SESSION['panier'])) {
            // Récupérer le panier de l'utilisateur
            $cart = $_SESSION['panier'];

            // Ajouter les articles du panier de l'utilisateur dans la base de données
            $DAOPanier = new \backend\DAO\DBPanier();
            foreach ($cart->getPanierArticles() as $article) {
                $DAOPanier->add($article,$user);
            }

            // Supprimer le panier de la session
            unset($_SESSION['panier']);
        }
        
        // Renvoyer vers le dashboard
        header("Location: /user/dashboard/informations");
    }
}
