<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/homePage.css">
    <link rel="stylesheet" href="../styles/article.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <link rel="stylesheet" href="../styles/payment.css">


</head>
<body>
<?php include '../components/header.php'; ?>
<div id="title-part">
    <span class="section-title-name">Paiement</span>
    <span class="">Régler mes achats</span>
</div>
<div id="page">
    <main>
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
                <br><br>
                
                
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
        <div class="personal-information">
            <span class="field-part-name">Localisation</span>
            <form>
                <div class="personal-field">
                    <div>
                        <label class="field-name" for="adress">Adresse</label>
                        <input type="text" placeholder="1 Rue Maréchal Joffre" id="adress">
                    </div>
                    <div>
                        <label class="field-name" for="postal-code">Code postal</label>
                        <input type="text" placeholder="44000" id="postal-code">
                    </div>
                    <div>
                        <label class="field-name" for="additional-address">Complément d'adresse</label>
                        <input type="text" placeholder="Appartement B15" id="additional-address">
                    </div> 
                    <div>
                        <label class="field-name" for="city">Ville</label>
                        <input type="text" placeholder="Nantes" id="city">
                    </div>
                </div>
            </form>
        </div>
        <div class="personal-information">
            <span class="field-part-name">Méthode de paiement</span>
            <form>
                <!-- à remplir  -->
            </form>
        </div>
    </main>
    <section id="payment">
        <div class="payment payment-size payment-part">
                    <div class="first-section-payment">
                        <div class="payment-title-text">Montant total de vos produits</div>
                        <div class="payment-text dark-grey">Prix TTC</div>
                    </div>
                    <div class="line"></div>
                    <div class="second-section-payment">
                        <div class="text-espace"><div class="payment-text grey">Sous-total</div><div id="st" class="payment-text text-weight-price">0.00€</div></div>
                        <div class="text-espace"><div class="payment-text grey">Taxes</div><div id="taxes" class="payment-text text-weight-price">0.00€</div></div>
                        <div class="text-espace"><div class="payment-text grey">Code promotionnel</div><div class="payment-text text-weight-price">0,00€</div></div>
                    </div>
                    <div class="line"></div>
                    <div class="third-section-payment">
                        <div class="payment-text">Code promo</div>
                        <div class="boite-code-promo">
                            <input class="code-promo" type="text" name="code" placeholder="Renseigner votre code ici">
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="final-section-payment">
                        <div class="text-espace">
                            <div>
                                <div class="payment-text">Prix total</div>
                                <div class="payment-scearch-text">Ce prix inclus les remises</div>
                            </div>
                            <div class="price">0.00€</div>
                        </div>
                    </div>
                    <a class="payment-size button important-text" href="#">Passer la commande</a>
                </div>
    </div>
    </section>

<?php include '../components/footer.php'; ?>
</body>
</html>