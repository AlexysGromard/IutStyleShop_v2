<?php
    namespace controller;

    class cookies {
        public static function acceptCookies() {
            // Stocker dans variable de session
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['cookieAccept'] = true;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        public static function denyCookies() {
            // Stocker dans variable de session
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['cookieAccept'] = false;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>