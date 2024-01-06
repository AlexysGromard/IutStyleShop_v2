<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Vérification de l'adresse mail</title>
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
            <h1 id="title">Vérification</h1>
            <h2 id="subtitle">Entrez le code reçu par mail à :</h2>
            <h2 id="subtitle">***@***.**</h2>
        </div>
        <section id="actions-container">
            <div class="action-box">
                <form action="" method="" id="confirmation-form">
                    <div id="confirmation-form-input-box">
                        <div class="confirmation-form-part">
                            <input class="confirmation-input" type="text" id="digit1" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                            <input class="confirmation-input" type="text" id="digit2" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                            <input class="confirmation-input" type="text" id="digit3" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                        </div>
                        <div class="confirmation-form-part">
                            <input class="confirmation-input" type="text" id="digit4" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                            <input class="confirmation-input" type="text" id="digit5" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                            <input class="confirmation-input" type="text" id="digit6" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                        </div>
                    </div>
                    <a id="btn-resend-code" href="#">Renvoyer le code</a>
                    <!-- Btn -->
                    <input class="button form-button" type="submit" value="Vérifier">
                </form>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
</body>
<script src="/frontend/scripts/authentication.js"></script>
</html>