<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <!-- link rel="stylesheet" href="/frontend/styles/carousel.css" -->
    <!-- link rel="stylesheet" href="/frontend/styles/cart.css" -->
</head>
<body>
    
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>

    <main>
        <span class="section-title-name"> Espace utilisateur</span>

        <div class = "">
            <!-- left make by alexy-->
            <div class="payment payment-size">
                
            </div>

            <!-- right -->
            <div class="personal-information">
                <div class="personal-information">
                    <span class="field-part-name">Informations personnelles</span>
                    <form>
                        <legend class="field-name" >Civilité</legend>
                        <input class="radioButton" type="radio" value="Femme" id="civility-woman" name="civility">
                        <label class="field-name" for="civility-woman">Femme</label>
                        <input class="radioButton" type="radio" value="Homme" id="civility-man" name="civility">
                        <label class="field-name"  for="civility-man">Homme</label>
                        <input class="radioButton" type="radio" value="Ne souhaite pas se prononcer" id="civility-none" name="civility" checked>
                        <label class="field-name" for="civility-none">Ne souhaite pas se prononcer</label>
                        <br><br><!--bizarre -->
                        
                        
                        <div class="personal-field">
                            <div>
                                <label class="field-name" for="last-name">Nom</label>
                                <input type="text" placeholder="Votre nom" id="last-name">
                            </div>
                            <div>
                                <label class="field-name" for="first-name">Prénom</label>
                                <input type="text" placeholder="Prénom" id="first-name">
                            </div>
                            <div>
                                <label class="field-name" for="mail">Adresse mail</label>
                                <input type="mail" placeholder="Votre adresse mail" id="mail">
                            </div>
                            <div>
                                <label class="field-name" for="phone">Numéro de téléphone</label>
                                <input type="phone" placeholder="06 00 00 00 00" id="phone">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'frontend/components/footer.php'; ?>

</body>