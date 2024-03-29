<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Inscription</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="frontend/styles/authentication.css">
</head>
<body>
    <header>
        <div class="header-top">
            <a class="link-to-home" href="/">
                <img src="/frontend/assets/images/Header-Image/logo.svg" alt="Image logo">
            </a>
            <a href="/login" class="button method-change-button">Connexion</a>
        </div>
    </header>
    <main>
        <form action="<?='register/registerCheck'?>" method="POST">
            <section id="main-section">
                <div id="page-title-section">
                    <h1 id="title">Inscription</h1>
                    <h2 id="subtitle">Bienvenu sur IutStyleShop !</h2>
                </div>
                <section id="actions-container">
                    <!-- Message prevention -->
                    <div class="warning_message">
                        <span>Ce site étant une version de démonstration, les informations ne sont pas réelles. Merci de ne pas renseigner de données sensibles.</span>
                    </div>
                    <!-- Civilité -->
                    <div class="action-box">
                        <!-- Genre -->
                        <div class="input-box">
                            <span class="input-label">Civilité</span>
                            <!-- Input radio -->
                            <div class="input-radio-choices">
                                <!-- Homme -->
                                <div class="input-radio-element">
                                    <input value="M" type="radio" name="civility" id="man" <?php echo (isset($_SESSION['civility']) && $_SESSION['civility'] == "M" )? "checked" : "";?>>
                                    <label class="radio-label" for="man">Homme</label>
                                </div>
                                <!-- Femme -->
                                <div class="input-radio-element">
                                    <input value="W" type="radio" name="civility" id="women" <?php echo (isset($_SESSION['civility']) && $_SESSION['civility'] == "W") ? "checked" : "";?>>
                                    <label class="radio-label" for="women">Femme</label>
                                </div>
                                <!-- Autre -->
                                <div class="input-radio-element">
                                    <input value="N" type="radio" name="civility" id="other" <?php echo (isset($_SESSION['civility']) && $_SESSION['civility'] == "N") ? "checked" : "";?>>
                                    <label class="radio-label" for="other">Ne souhaite pas se prononcer</label>
                                </div>
                            </div>
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["civility"]) && $_SESSION['errors']["civility"]) ? "active" : ""; ?>">Genre incomplet</span>
                        </div>
                        <!-- Nom -->
                        <div class="input-box">
                            <label class="input-label" for="lastname">Nom</label>
                            <input class="input-field" type="text" id="lastname" name="lastname" placeholder="Entrez votre nom" value="<?php echo (isset($_SESSION['lastname']) && $_SESSION['lastname']) ? $_SESSION['lastname'] : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["lastname"]) && $_SESSION['errors']["lastname"]) ? "active" : ""; ?>">Nom invalide</span>
                        </div>
                        <!-- Prénom -->
                        <div class="input-box">
                            <label class="input-label" for="firstname">Prénom</label>
                            <input class="input-field" type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom" value="<?php echo (isset($_SESSION['firstname']) && $_SESSION['firstname']) ? $_SESSION['firstname'] : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["firstname"]) && $_SESSION['errors']["firstname"]) ? "active" : ""; ?>">Prénom invalide</span>
                        </div>
                    </div>
                    <!-- Identifiants -->
                    <div class="action-box">
                        <!-- Adresse email -->
                        <div class="input-box">
                            <label class="input-label" for="email">Adresse mail</label>
                            <input class="input-field" type="email" id="email" name="email" placeholder="Entrez votre adresse mail" value="<?php echo (isset($_SESSION['email']) && $_SESSION['email']) ? $_SESSION['email'] : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["email"]) && $_SESSION['errors']["email"]) ? "active" : ""; ?>">Adresse mail invalide</span>
                        </div>
                        <!-- Mot de passe -->
                        <div class="input-box">
                            <label class="input-label" for="password">Mot de passe</label>
                            <input class="input-field" type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["password"]) && $_SESSION['errors']["password"]) ? "active" : ""; ?>">Mot de passe invalide</span>
                        </div>
                        <!-- Confirmation du mot de passe -->
                        <div class="input-box">
                            <label class="input-label" for="password-confirmation">Confirmation du mot de passe</label>
                            <input class="input-field" type="password" id="password-confirmation" name="password-confirmation" placeholder="Confirmez votre mot de passe">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["passwordConfirmation"]) && $_SESSION['errors']["passwordConfirmation"]) ? "active" : ""; ?>">Confirmation du mot de passe invalide</span>
                        </div>
                        <!-- Champ pour le jeton CSRF -->
                        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                        <!-- Btn -->
                        <input class="button form-button" type="submit" value="S'inscrire">
                    </div>
                    <div class="action-box change-method">
                        <span class="change-method-text">Vous avez déjà un compte IutStyleShop ?</span>
                        <a class="change-method-btn" href="/login">Connexion</a>
                    </div>
                </section>
            </section>
        </form>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
</html>