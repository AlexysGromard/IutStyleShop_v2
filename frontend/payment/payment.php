<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - IutStyleShop</title>
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
        <span class="Black_police_70">Paiement</span>
        <span class="Gray_police_50">Régler mes achats</span>
    </div>

    <div class="element_page">
        <!-- ~~~~~~~~~~~~Ajouter des require~~~~~~~~~~~~ -->
        <form class="payment_left_box" action="xx">
            <div class="large_box" >        
                <span class="Black_police_65">Informations personnelles</span>
                <div class="civility_choice_space">
                    <span class="Black_police_55" >Civilité</span>
                    <div>
                        <label for="civility-woman" class="radio_button_space">
                            <?php
                                $input = '<input class="radioButton" type="radio" value="Femme" id="civility-woman" name="civility" ';
                                if ($personne->genre=='F' ) {
                                    $input.= 'checked ';
                                }
                                $input.= '/> ';
                                echo $input;

                            ?>
                            <span class="Black_police_40" >Femme</span>
                        </label>
                        <label for="civility-man" class="radio_button_space">
                            <?php
                                $input = '<input class="radioButton" type="radio" value="Homme" id="civility-man" name="civility" ';
                                if ($personne->genre=='M' ) {
                                    $input.= 'checked ';
                                }
                                $input.= '/> ';
                                echo $input;

                            ?>
                            <span class="Black_police_40"  >Homme</span>
                        </label>
                        <label for="civility-none" class="radio_button_space">
                            <?php
                                $input = '<input class="radioButton" type="radio" value="Ne souhaite pas se prononcer" id="civility-none" name="civility" ';
                                if ($personne->genre!='M' && $personne->genre!='F' ) {
                                    $input.= 'checked ';
                                }
                                $input.= '/> ';
                                echo $input;

                            ?>  
                            <span class="Black_police_40" >Ne souhaite pas se prononcer</span>
                        </label>
                    </div>
                </div>              
                <div class="square_of_2">
                    <div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="last-name">Nom</label>
                            <input class="sidebar" type="text" placeholder="Votre nom" id="last-name" name="Nom" value=<?= $personne->nom;?> >
                        </div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="first-name">Prénom</label>
                            <input class="sidebar" type="text" placeholder="Prénom" id="first-name" name="Prenom" value=<?= $personne->prenom;?>>
                        </div>
                    </div>
                    <div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="mail">Adresse mail</label>
                            <input class="sidebar" type="mail" placeholder="Votre adresse mail" id="mail" name="mail" value=<?= $personne->mail;?>>
                        </div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="phone">Numéro de téléphone</label>
                            <input class="sidebar" type="phone" placeholder="06 00 00 00 00" id="phone" name="tel">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="large_box">
                <!-- infomation sur l'adresse phisique -->
                <span class="Black_police_65">Localisation</span>

                <div class="square_of_2">
                    <div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="adresse">Adresse</label>
                            <input class="sidebar" type="text" placeholder="1 Rue du marechal joffre" id="adresse" name="adresse" value=<?= $personne->adresse;?>>
                        </div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="code">Code postal</label>
                            <input class="sidebar" type="text" placeholder="44000" id="code" name="code" value=<?= $personne->code_postal;?>>
                        </div>
                    </div>
                    <div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="complement_adresse">Complément d'adresse</label>
                            <input class="sidebar" type="text" placeholder="Appartement B15" id="complement_adresse" name="complement_adresse" value=<?= $personne->complement_adresse;?>>
                        </div>
                        <div class="inputText_space">
                            <label class="Black_police_55" for="ville">Ville</label>
                            <input class="sidebar" type="text" placeholder="Nantes" id="ville" name="ville" value=<?= $personne->ville;?>>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="large_box">
                <span class="Black_police_65">Méthode de paiement</span>
                
                <!-- à remplir  -->
                
                    <div class="large_gray_box">
                        <div class ="top_payment_method">
                            <label  for="panel-1"  class = "radio_button_space">
                                <input type="radio" name="panel" id="panel-1" class="radioButton_reverse" onclick="unroll_items(1)">
                                <span class="Black_police_55">Carte de crédit</span>
                            </label>
                            <div class="payment-type-img">
                                <img src="/frontend/assets/icons/visa2.svg">
                                <img src="/frontend/assets/icons/mastercard.svg">
                            </div>
                        </div>
                        

                        <div id="box-payment-1" class="accordion__content square_of_2">

                            <div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="number">Numéro carte bancaire</label>
                                    <input class="sidebar_reverse" type="text" placeholder="XXXX XXXX XXXX XXXX" id="number">
                                </div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="card-name">Nom sur la carte</label>
                                    <input class="sidebar_reverse" type="text" placeholder="Mr Bertrand" id="card-name">
                                </div>
                            </div>
                            
                            <div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="date">Date d'expiration</label>
                                    <input class="sidebar_reverse" type="date" id="date">
                                </div>
                                
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="cvec">CVEC</label>
                                    <input class="sidebar_reverse" type="text" placeholder="123" id="cvec">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="large_gray_box">
                        <div class ="top_payment_method">
                            <label class="radio_button_space" for="panel-2">
                                <input type="radio" name="panel" id="panel-2" class="radioButton_reverse" onclick="unroll_items(2)">
                                <span  class="Black_police_55">Bitcoin</span>
                            </label>

                            <img class="payment-type-img" src="/frontend/assets/icons/bitcoin.svg">
                        </div>
                        
                        
                        <div id="box-payment-2" class="accordion__content accordion__content--small">
                            <p class="Black_police_45">Vous payerez en bitcoin après avoir validé votre commande.</p>
                        </div>
                    </div>
                    
                
                
            </div>
            <button type="submit" class="payment-size button White_police_40">Passer la commande</button>
        </form>

        <div class="normal_box_payment payment-size">
            <div class="titel_box">
                <span class="Black_police_65">Montant total de vos produits</span>
                <span class="Gray_police_45">Prix TTC</span>
            </div>
            <div class="line"></div>
            <div class="second-section-payment">
                <div class="text-espace"><span class="Gray_police_45">Sous-total</span><span id="st" class="Black_police_50">0.00€</span></div>
                <div class="text-espace"><span class="Gray_police_45">Taxes</span><span id="taxes" class="Black_police_50">0.00€</span></div>
                <div class="text-espace"><span class="Gray_police_45">Code promotionnel</span><span class="Black_police_50">0,00€</span></div>
            </div>
            <div class="line"></div>
            <div class="third-section-payment">
                <span class="Black_police_45">Code promo</span>
                <div class="boite-code-promo">
                    <input class="code-promo" type="text" name="code" placeholder="Renseigner votre code ici">
                </div>
            </div>
            <div class="line"></div>
            <div class="final-section-payment">
                <div class="text-espace">
                    <div>
                        <span class="Black_police_45">Prix total</span>
                        <span class="Gray_police_40">Ce prix inclus les remises</span>
                    </div>
                    <span class="Black_police_75">0.00€</span>
                </div>
            </div>
            
        </div>
        
        
</main>

<?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/payment.js"></script>
</html>