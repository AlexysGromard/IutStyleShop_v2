<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - IutStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
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
                    <!-- <span class="Black_police_55" >Civilité</span>
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
                    </div> -->
                    <!-- Genre -->
                    <div class="input-box">
                        <span class="input-label">Civilité</span>
                        <!-- Input radio -->
                        <div class="input-radio-choices">
                            <!-- Homme -->
                            <div class="input-radio-element">
                                <input value="M" type="radio" name="civility" id="man" <?= $personne->genre=='M' ? 'checked' : '' ?>>
                                <label class="radio-label" for="man">Homme</label>
                            </div>
                            <!-- Femme -->
                            <div class="input-radio-element">
                                <input value="W" type="radio" name="civility" id="women" <?= $personne->genre=='W' ? 'checked' : '' ?>>
                                <label class="radio-label" for="women">Femme</label>
                            </div>
                            <!-- Autre -->
                            <div class="input-radio-element">
                                <input value="N" type="radio" name="civility" id="other" <?= $personne->genre!='M' && $personne->genre!='W' ? 'checked' : '' ?>>
                                <label class="radio-label" for="other">Ne souhaite pas se prononcer</label>
                            </div>
                        </div>
                        <span class="input-error-message <?php echo (isset($_SESSION['errors']["civility"]) && $_SESSION['errors']["civility"]) ? "active" : ""; ?>">Genre incomplet</span>
                    </div>
                </div>              
                <div class="square_of_2">
                    <div>
                        <!-- Nom -->
                        <div class="input-box">
                            <label class="input-label" for="lastname">Nom</label>
                            <input class="input-field" type="text" id="lastname" name="lastname" placeholder="Entrez votre nom" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getNom() : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["lastname"]) && $_SESSION['errors']["lastname"]) ? "active" : ""; ?>">Nom invalide</span>
                        </div>
                        <!-- Prénom -->
                        <div class="input-box">
                            <label class="input-label" for="firstname">Prénom</label>
                            <input class="input-field" type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getPrenom() : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["firstname"]) && $_SESSION['errors']["firstname"]) ? "active" : ""; ?>">Prénom invalide</span>
                        </div>
                    </div>
                    <div>
                        <!-- Adresse email -->
                        <div class="input-box">
                            <label class="input-label" for="email">Adresse mail</label>
                            <input class="input-field" type="email" id="email" name="email" placeholder="Entrez votre adresse mail" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getEmail() : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["email"]) && $_SESSION['errors']["email"]) ? "active" : ""; ?>">Adresse mail invalide</span>
                        </div>
                        <!-- Numéro de téléphone -->
                        <div class="input-box">
                            <label class="input-label" for="phone">Numéro de téléphone</label>
                            <input class="input-field" type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getTelephone() : "";?>">
                            <span class="input-error-message <?php echo (isset($_SESSION['errors']["phone"]) && $_SESSION['errors']["phone"]) ? "active" : ""; ?>">Numéro de téléphone invalide</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="large_box">
                <!-- infomation sur l'adresse phisique -->
                <span class="Black_police_65">Localisation</span>

                <div class="square_of_2">
                    <div>
                        <!-- Adresse -->
                        <div class="input-box">
                            <label class="input-label" for="address">Adresse</label>
                            <input class="input-field sidebar" type="text" id="address" name="address" placeholder="Entrez votre adresse" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getAdresse() : "";?>">
                            <span class="input-error-message ">Adresse invalide</span>
                        </div>
                        <!-- Code postal -->
                        <div class="input-box">
                            <label class="input-label" for="code">Code postal</label>
                            <input class="input-field sidebar" type="text" placeholder="Entrez votre code postal" id="code" name="code" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getCodePostal() : "";?>">
                            <span class="input-error-message ">Code postal invalide</span>
                        </div>
                    </div>
                    <div>
                        <!-- Complément d'adresse -->
                        <div class="input-box">
                            <label class="input-label" for="complement">Complément d'adresse</label>
                            <input class="input-field sidebar" type="text" id="complement" name="complement" placeholder="Entrez votre complément d'adresse" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getComplementAdresse() : "";?>">
                            <span class="input-error-message ">Complément d'adresse invalide</span>
                        </div>
                        <!-- Ville -->
                        <div class="input-box">
                            <label class="input-label" for="city">Ville</label>
                            <input class="input-field sidebar" type="text" id="city" name="city" placeholder="Entrez votre ville" value="<?= isset($_SESSION['user']) ? $_SESSION['user']->getVille() : "";?>">
                            <span class="input-error-message ">Ville invalide</span>
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
            <div class="text-espace">
                <div class="payment-text grey">Sous-total</div>
                    <div id="st" class="payment-text text-weight-price">
                        <?php echo number_format($panier->getPrixTotal(), 2); ?>€
                    </div>
                </div>

                <div class="text-espace">
                    <span class="Gray_police_45">Taxes</span>
                    <span id="taxes" class="Black_police_50">
                        <?php echo number_format($panier->getPrixTotal() * 0.2, 2); ?>€
                    </span>
                </div>

                <div class="text-espace">
                    <span class="Gray_police_45">Code promotionnel <?= isset($codePromo) && $codePromo->getPromo() != 0 ? " : ".$codePromo->getCode() : "";?></span>
                    <span class="Black_police_50">
                        <?= (isset($codePromo) && $codePromo->getPromo() != 0 )? "-".number_format($panier->getPrixTotal() * $codePromo->getPromo() / 100, 2) : "0"; ?>€
                    </span>
                </div>
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
                    <span class="Black_police_75"><?= (isset($codePromo) && $codePromo->getPromo() != 0 )? number_format($panier->getPrixTotal() - $panier->getPrixTotal() * $codePromo->getPromo() / 100, 2) : number_format($panier->getPrixTotal(), 2); ?>€</span>
                </div>
            </div>
        </div>
</main>

<?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/payment.js"></script>
</html>