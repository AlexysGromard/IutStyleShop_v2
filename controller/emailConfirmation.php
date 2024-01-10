<?php
namespace controller;

require_once 'backend/config/config.php';
require_once 'backend/library/PHPMailer-6.9.1/src/PHPMailer.php';
require_once 'backend/library/PHPMailer-6.9.1/src/SMTP.php';
require_once 'backend/library/PHPMailer-6.9.1/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class emailConfirmation {

    public $errors = array(
        "code" => false
    );

    function index(){
        session_start();

        if (isset($_SESSION['email'])) {
            session_write_close();
            require "frontend/authentication/email-confirmation.php";

            // Send code
            $this->sendCode();

            unset($_SESSION['errors']);
        } else {
            header("Location: /register");
            exit();
        }
    }

    /*
    * Cette fonction permet générer un code de confirmation
    */
    function generateConfirmationCode() {
        return mt_rand(100000, 999999);
    }

    function sendCode() {
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
        session_start();

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
            $this->errors['code'] = true;
        }

        // Redirection si erreur
        if (in_array(true, $this->errors)) {
            $_SESSION['errors'] = $this->errors;

            header("Location: /register");
            exit();
        }

        // Création de l'utilisateur
        $user = new \backend\entity\UserEntity();
        $user->createIdentifiedUser(
            0,
            $_SESSION['email'],
            $_SESSION['lastname'],
            $_SESSION['firstname'],
            $_SESSION['civility'],
            "client",
            "",
            "",
            "",
            new \backend\entity\PanierEntity(
                array(),
                array(),
                array()
            )
        );

        // Supprimer les données de la session
        unset($_SESSION['civility']);
        unset($_SESSION['lastname']);
        unset($_SESSION['firstname']);
        unset($_SESSION['email']);
        unset($_SESSION['confirmationCode']);
        
        // Renvoyer vers le dashboard
        header("Location: /user/dashboard/informations");
    }
}
