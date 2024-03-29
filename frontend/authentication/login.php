<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Connexion</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="frontend/styles/authentication.css">
</head>
<body>
    <header>
        <div class="header-top">
            <a class="link-to-home" href="/">
                <img src="/frontend/assets/images/Header-Image/logo.svg" alt="Image logo">
            </a>
            <a class="button method-change-button" href="/register">Inscription</a>
        </div>
    </header>
    <main id="main-section">
        <div id="page-title-section">
            <h1 id="title">Connexion</h1>
            <h2 id="subtitle">En utilisant vos identifiants IutStyleShop</h2>
        </div>
        <section id="actions-container">
                    <!-- Message prevention -->
        <div class="warning_message">
            <span>Ce site étant une version de démonstration, les informations ne sont pas réelles. Merci de ne pas renseigner de données sensibles.</span>
        </div>
            <div class="action-box">
                <!-- Connexion par mot de passe -->
                <form action="<?='login/loginCheck'?>" method="POST">
                    <!-- Adresse email -->
                    <div class="input-box">
                        <label class="input-label" for="email">Adresse mail</label>
                        <input required class="input-field" type="email" id="email" name="email" placeholder="Entrez votre adresse mail" value="<?php echo (isset($_SESSION['email']) && $_SESSION['email']) ? $_SESSION['email'] : "";?>">
                        <span class="input-error-message <?php echo (isset($_SESSION['errors']["email"]) && $_SESSION['errors']["email"]) ? "active" : ""; ?>">Adresse mail invalide</span>
                    </div>
                    <!-- Mot de passe -->
                    <div class="input-box">
                        <div id="password-header">
                            <label class="input-label" for="password">Mot de passe</label>
                            <a class="link-to-password-recovery" id="password-recovery-btn">Mot de passe oublié ?</a>
                        </div>
                        <input required class="input-field" type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                        <span class="input-error-message <?php echo (isset($_SESSION['errors']["password"]) && $_SESSION['errors']["password"]) ? "active" : ""; ?>">Mot de passe invalide</span>
                    </div>
                    <!-- Champ pour le jeton CSRF -->
                    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                    <!-- Btn -->
                    <input class="button form-button" type="submit" value="Se connecter">
                </form>
                <!-- Barre de séparation -->
                <div class="separator-bar">
                    <span class="separator-bar-text">OU</span>
                </div>
                <!-- Passkey -->
                <a class="passkey-button" id="passkey-btn"><img src="/frontend/assets/icons/passskey_logo.svg" alt="Passkey logo">Se connecter avec Passkey</a>
            </div>
            <div class="action-box change-method">
                <span class="change-method-text">Vous êtes nouveau sur IutStyleShop ?</span>
                <a class="change-method-btn" href="/register">Créer un compte</a>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script>
    // Quand password-recovery-btn est cliqué, afficher une popup d'erreur
    document.getElementById("password-recovery-btn").addEventListener("click", function() {
        showErrorPopup('Fonction non disponible', 'Cette fonctionnalité n\'est pas encore disponible.')
    });
    // Quand passkey-btn est cliqué, afficher une popup d'erreur
    document.getElementById("passkey-btn").addEventListener("click", function() {
        showErrorPopup('Fonction non disponible', 'Cette fonctionnalité n\'est pas encore disponible.')
    });
</script>
</html>