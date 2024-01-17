<!-- Common-includes.php -->
<!-- CSS files -->
<link rel="stylesheet" href="/frontend/styles/variables.css">
<link rel="stylesheet" href="/frontend/styles/general.css">
<link rel="stylesheet" href="/frontend/styles/popup.css">
<link rel="stylesheet" href="/frontend/styles/common/form.css">

<!-- favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/frontend/assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/frontend/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/frontend/assets/favicon/favicon-16x16.png">
<link rel="mask-icon" href="/frontend/assets/favicon/safari-pinned-tab.svg" color="#D61644">
<meta name="theme-color" content="#F8F8F8">

<!-- PHP Components -->
<?php include_once 'components/cookies-popup.php'; ?>

<?php include_once 'components/error-popup.php'; ?>
<?php include_once 'components/success-popup.php'; ?>

<?php include_once 'components/logout-popup.php'; ?>

<!-- JS files -->
<script src="/frontend/scripts/popup.js"></script>

<!-- Call cookies verification -->
<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['cookieAccept'])) {
    echo "<script>showCookiesPopup()</script>";
  }
?>

<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['cookieAccept']) && $_SESSION['cookieAccept'] == true) {
  echo "
    <!-- Google tag (gtag.js) -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-SWLPL3D67R\"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-SWLPL3D67R');
    </script>
  ";
}
session_write_close();
?>
