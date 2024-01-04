<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Inscription</title>
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
    <form action="" method="">
        <main id="main-section">
            <div id="page-title-section">
                <h1 id="title">Inscription</h1>
                <h2 id="subtitle">Bienvenu sur IutStyleShop !</h2>
            </div>
            <section id="actions-container">
                <!-- Civilité -->
                <div class="action-box">
                    <!-- Genre -->
                    <div class="input-box">
                        <span class="input-label">Civilité</span>
                        <!-- Input radio -->
                        <div class="input-radio-choices">
                            <!-- Homme -->
                            <div class="input-radio-element">
                                <input type="radio" name="civility" id="man">
                                <label class="radio-label" for="man">Homme</label>
                            </div>
                            <!-- Femme -->
                            <div class="input-radio-element">
                                <input type="radio" name="civility" id="women">
                                <label class="radio-label" for="women">Femme</label>
                            </div>
                            <!-- Autre -->
                            <div class="input-radio-element">
                                <input type="radio" name="civility" id="other">
                                <label class="radio-label" for="other">Ne souhaite pas se prononcer</label>
                            </div>
                        </div>
                        <span class="input-error-message">Genre incomplet</span>
                    </div>
                    <!-- Nom -->
                    <div class="input-box">
                        <label class="input-label" for="lastname">Nom</label>
                        <input class="input-field" type="text" id="lastname" name="lastname" placeholder="Entrez votre nom">
                        <span class="input-error-message">Nom invalide</span>
                    </div>
                    <!-- Prénom -->
                    <div class="input-box">
                        <label class="input-label" for="firstname">Prénom</label>
                        <input class="input-field" type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom">
                        <span class="input-error-message">Prénom invalide</span>
                    </div>
                </div>
                <!-- Identifiants -->
                <div class="action-box">
                    <!-- Adresse email -->
                    <div class="input-box">
                        <label class="input-label" for="email">Adresse mail</label>
                        <input class="input-field" type="email" id="email" name="email" placeholder="Entrez votre adresse mail">
                        <span class="input-error-message">Adresse mail invalide</span>
                    </div>
                    <!-- Mot de passe -->
                    <div class="input-box">
                        <label class="input-label" for="password">Mot de passe</label>
                        <input class="input-field" type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                        <span class="input-error-message">Mot de passe invalide</span>
                    </div>
                    <!-- Confirmation du mot de passe -->
                    <div class="input-box">
                        <label class="input-label" for="password-confirmation">Confirmation du mot de passe</label>
                        <input class="input-field" type="password" id="password-confirmation" name="password-confirmation" placeholder="Confirmez votre mot de passe">
                        <span class="input-error-message">Confirmation du mot de passe invalide</span>
                    </div>
                    <!-- Btn -->
                    <input class="button form-button" type="submit" value="S'inscrire">
                </div>
                <div class="action-box change-method">
                    <span class="change-method-text">Vous avez déjà un compte IutStyleShop ?</span>
                    <a class="change-method-btn" href="/frontend/authentication/register.php">Connexion</a>
                </div>
            </section>
        </main>
    </form>
    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
</body>