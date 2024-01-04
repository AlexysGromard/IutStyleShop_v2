<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Passkey</title>
    <?php include '../common-includes.php'?>
    <link rel="stylesheet" href="../styles/authentication.css">
</head>
<body>
    <header>
        <div class="header-top">
            <a class="link-to-home" href="/frontend/">
                <img src="/frontend/assets/images/Header-Image/logo.svg" alt="Image logo">
            </a>
            <a class="button method-change-button">Connexion</a>
        </div>
    </header>
    <main id="main-section">
        <div id="page-title-section">
            <h1 id="title">Passkey</h1>
            <h2 id="subtitle">Souhaiter vous utilisez Passkey ?</h2>
        </div>
        <section id="actions-container">
            <div class="action-box">
                <!-- Utiliser passkey -->
                <a class="passkey-button" href="#"><img src="/frontend/assets/icons/passskey_logo.svg" alt="Passkey logo">Se connecter avec Passkey</a>
                <!-- Barre de séparation -->
                <div class="separator-bar">
                    <span class="separator-bar-text">OU</span>
                </div>
                <!-- Continuer sans passkey -->
                <a class="button without-passkey" href="#">Continuer sans Passkey</a>
            </div>
            <p>Passkey est une nouvelle façon de se connecter qui fonctionne entièrement sans mot de passe. En utilisant les capacités de sécurité de vos appareils comme Touch ID et Face ID, les mots de passe sont bien plus sécurisés et plus faciles à utiliser que les mots de passe et toutes les méthodes actuelles d'authentification à 2 facteurs (2FA).</p>
        </section>
    </main>
    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
</body>
</html>