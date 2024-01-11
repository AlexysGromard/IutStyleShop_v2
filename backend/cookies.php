<?php
    class Cookies {
        public static function verifyCookies() {
            // Vérfication si un cookie "cookieAccept" existe
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if(!isset($_SESSION['cookieAccept'])) {
                // Si non, on affiche la popup
               // echo "<script>showCookiesPopup()</script>";
            }
        }
        public static function acceptCookies() {
            // Stocker dans variable de session
            session_start();
            $_SESSION['cookieAccept'] = true;
        }

        public static function denyCookies() {
            // Stocker dans variable de session
            session_start();
            $_SESSION['cookieAccept'] = false;
        }
    }
    if (isset($_POST['accept-cookies'])) {
        Cookies::acceptCookies();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else if (isset($_POST['deny-cookies'])) {
        Cookies::denyCookies();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
?>