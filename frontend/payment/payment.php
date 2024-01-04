<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">

    <link rel="stylesheet" href="/frontend/styles/cart.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/payment.css">


</head>
<body>
<?php include 'frontend/components/header.php'; ?>

<main class="user_general">
    <div class="titel_box">
        <span class="policex3">Paiement</span>
        <span class="policez2">Régler mes achats</span>
    </div>

    <div class="element_page">
        <!-- ~~~~~~~~~~~~Ajouter des require~~~~~~~~~~~~ -->
        <form class="payment_left_box" action="xx">
            <div class="large_box" >        
                <span class="policex1">Informations personnelles</span>
                <div class="civility_choice_space">
                    <span class="policew1" >Civilité</span>
                    <div>
                        <label for="civility-woman" class="radio_button_space">
                            <input class="radioButton" type="radio" value="Femme" id="civility-woman" name="civility">
                            <span class="policew2" >Femme</span>
                        </label>
                        <label for="civility-man" class="radio_button_space">
                            <input class="radioButton" type="radio" value="Homme" id="civility-man" name="civility">
                            <span class="policew2"  >Homme</span>
                        </label>
                        <label for="civility-none" class="radio_button_space">
                            <input class="radioButton" type="radio" value="Ne souhaite pas se prononcer" id="civility-none" name="civility" checked>
                            <span class="policew2" >Ne souhaite pas se prononcer</span>
                        </label>
                    </div>
                </div>              
                <div class="square_of_2">
                    <div>
                        <div class="inputText_space">
                            <label class="policew1" for="last-name">Nom</label>
                            <input class="sidebar" type="text" placeholder="Votre nom" id="last-name" name="Nom">
                        </div>
                        <div class="inputText_space">
                            <label class="policew1" for="first-name">Prénom</label>
                            <input class="sidebar" type="text" placeholder="Prénom" id="first-name" name="Prenom">
                        </div>
                    </div>
                    <div>
                        <div class="inputText_space">
                            <label class="policew1" for="mail">Adresse mail</label>
                            <input class="sidebar" type="mail" placeholder="Votre adresse mail" id="mail" name="mail">
                        </div>
                        <div class="inputText_space">
                            <label class="policew1" for="phone">Numéro de téléphone</label>
                            <input class="sidebar" type="phone" placeholder="06 00 00 00 00" id="phone" name="tel">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="large_box">
                <!-- infomation sur l'adresse phisique -->
                <span class="policex1">Localisation</span>

                <div class="square_of_2">
                    <div>
                        <div class="inputText_space">
                            <label class="policew1" for="adresse">Adresse</label>
                            <input class="sidebar" type="text" placeholder="1 Rue du marechal joffre" id="adresse" name="adresse">
                        </div>
                        <div class="inputText_space">
                            <label class="policew1" for="code">Code postal</label>
                            <input class="sidebar" type="text" placeholder="44000" id="code" name="code">
                        </div>
                    </div>
                    <div>
                        <div class="inputText_space">
                            <label class="policew1" for="complement_adresse">Complément d'adresse</label>
                            <input class="sidebar" type="text" placeholder="Appartement B15" id="complement_adresse" name="complement_adresse">
                        </div>
                        <div class="inputText_space">
                            <label class="policew1" for="ville">Ville</label>
                            <input class="sidebar" type="text" placeholder="Nantes" id="ville" name="ville">
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="large_box">
                <span class="policex1">Méthode de paiement</span>
                
                <!-- à remplir  -->
                
            </div>
            <button type="submit" class="payment-size button policey1">Passer la commande</button>
        </form>

        <div id="payment">
            <div class="normal_box_payment payment-size">
                        <div class="titel_box">
                            <div class="policex1">Montant total de vos produits</div>
                            <div class="policez3">Prix TTC</div>
                        </div>
                        <div class="line"></div>
                        <div class="second-section-payment">
                            <div class="text-espace"><span class="policez3">Sous-total</span><span id="st" class="policew4">0.00€</span></div>
                            <div class="text-espace"><span class="policez3">Taxes</span><span id="taxes" class="policew4">0.00€</span></div>
                            <div class="text-espace"><span class="policez3">Code promotionnel</span><span class="policew4">0,00€</span></div>
                        </div>
                        <div class="line"></div>
                        <div class="third-section-payment">
                            <div class="policew3">Code promo</div>
                            <div class="boite-code-promo">
                                <input class="code-promo" type="text" name="code" placeholder="Renseigner votre code ici">
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="final-section-payment">
                            <div class="text-espace">
                                <div>
                                    <div class="policew3">Prix total</div>
                                    <div class="policez1">Ce prix inclus les remises</div>
                                </div>
                                <div class="policex5">0.00€</div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
        
</main>

<?php include 'frontend/components/footer.php'; ?>
</body>
</html>