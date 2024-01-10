<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Espace utilisateur</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">
    <!--?php include "..\components\user-panel"?-->
</head>
<body>
    
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>

    <main class = "user_general">
        <span class="page-title"> Espace utilisateur</span>
        <div class = "user_general_element_box">
            <!-- left make by alexy-->
            

            <?php include "frontend/components/user-panel.php" ?>
            <?php generateUserPanelComponent($actionSelect, $personne->getNom()." ".$personne->getPrenom(), $personne->getId(), $personne->getGenre(), $personne->getRole()); ?>


            <!-- right -->
            <div class="user_right_box">
                <?php if ($actionSelect == "Mes informations") :?> 
                    <!-- information personnel -->
                    <form class="large_box" action="xx">
                        <span class="Black_police_65">Informations personnelles</span>
                        <div class="civility_choice_space">
                            <!-- Civilité -->
                            <div>
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
                            </div>
                        </div>              
                        <div class="square_of_2">
                            <div>
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
                            <div>
                                <!-- Adresse email -->
                                <div class="input-box">
                                    <label class="input-label" for="email">Adresse mail</label>
                                    <input class="input-field" type="email" id="email" name="email" placeholder="Entrez votre adresse mail">
                                    <span class="input-error-message">Adresse mail invalide</span>
                                </div>
                                <!-- Numéro de téléphone -->
                                <div class="input-box">
                                    <label class="input-label" for="phone">Numéro de téléphone</label>
                                    <input class="input-field" type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone">
                                    <span class="input-error-message">Numéro de téléphone invalide</span>
                                </div>
                            </div>
                        </div>
                        <!-- Btn -->
                        <input class="button form-button" type="submit" value="Valider">
                    </form>

                    <!-- modification password -->
                    <form class="large_box" action="xx">
                        <span class="Black_police_65">Changer de mot de passe</span>
                        <div class="input_password_space">
                            <!-- Mot de passe actuel-->
                            <div class="input-box">
                                <label class="input-label" for="password">Mot de passe actuel</label>
                                <input class="input-field" type="password" id="password" name="password" placeholder="Entrez votre mot de passe actuel">
                                <span class="input-error-message">Mot de passe invalide</span>
                            </div>
                            <!-- Confirmation du mot de passe -->
                            <div class="input-box">
                                <label class="input-label" for="password-confirmation">Nouveau mot de passe</label>
                                <input class="input-field" type="password" id="password-confirmation" name="password-confirmation" placeholder="Entrez votre nouveau mot de passe">
                                <span class="input-error-message">Le mot de passe ne correspond pas aux exigences</span>
                            </div>
                        </div>
                        <!-- Btn -->
                        <input class="button form-button" type="submit" value="Valider">
                    </form>
                <?php elseif ($actionSelect == "Mes commandes") :?>
                    <div class="large_box" action="xx">

                        <!-- historique commande -->
                        <div class= titel_box>
                            <span class="Black_police_65">Historique de vos commandes</span>
                            <span class="Black_police_45">2022 - 2024</span>
                        </div>
                        
                        <div class="all_commandes_box">
                            <!-- 1er boucle for -->
                            <div class="all_commande_box">
                                <div class="commande_box">
                                    <div class = "commande_box_left">
                                        <img class="first_product_image" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                                        <div class="commande_text_box_left">
                                            <span class="Black_police_55">Sweat rouge IUT, T-Shirt blanc IUT, ...</span>
                                            <span class="Black_police_40">Commandé le 30 novembre 2023 </span>
                                        </div>
                                    </div>
                                    <div class="commande_box_right">
                                        <div class="commande_text_box_right">
                                            <span class="Black_police_40">Etat de la commande</span>
                                            <span class="Black_police_65">En cours de traitement</span>
                                        </div>
                                        <div class="commande_text_box_right">
                                            <span class="Black_police_40">Total de la commande</span>
                                            <span class="Black_police_65" >77,99€</span>
                                        </div>
                                        <label class="drop_down_button">
                                            <input type="checkbox" id="checkbox_product_0" onclick="unroll_items(0)">
                                            <img src="/frontend/assets/icons/blackarrow.png" alt="Image de flèche">
                                        </label>
                                    </div>
                                </div>
                                <!-- 2ème boucle for -->
                                <div class=all_products_command id=box_product_0>
                                    <div class="commande_box product_box_commande">
                                        <div class = "commande_box_left">
                                            <img class="product_image_commande" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                                            <div class="commande_text_box_left">
                                                <span class="Black_police_60">Lorem ipsum dolor sit amet</span>
                                                <span class="Black_police_40">Taille : S</span>
                                                <span class="Black_police_40">Couleur : Rouge</span>
                                                <span class="Black_police_40">Quantité : 1</span>
                                            </div>
                                        </div>
                                        <div class="commande_box_right product_box_left_commande">
                                            <div class="commande_text_box_right">
                                                <span class="Black_police_40">Prix unitaire</span>
                                                <span class="Black_police_65">39,99€</span>
                                            </div>
                                            <div class="commande_text_box_right">
                                                <span class="Black_police_40">Sous-total</span>
                                                <span class="Black_police_65" >39,99€  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        test
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <span>test</span>
                            </div>
                        </div>
                        
                    </div>
                <?php elseif ($actionSelect == "Mon adresse") :?>
                    <form class="large_box" action="xx">
                        <!-- infomation sur l'adresse phisique -->
                        <span class="Black_police_65">Mon adresse</span>

                        <div class="square_of_2">
                            <div>
                                <!-- Adresse -->
                                <div class="input-box">
                                    <label class="input-label" for="adresse">Adresse</label>
                                    <input class="input-field" type="text" id="adresse" name="adresse" placeholder="Entrez votre adresse">
                                    <span class="input-error-message">Adresse invalide</span>
                                </div>
                                <!-- Code postal -->
                                <div class="input-box">
                                    <label class="input-label" for="code_postal">Code postal</label>
                                    <input class="input-field" type="text" id="code_postal" name="code_postal" placeholder="Entrez votre code postal">
                                    <span class="input-error-message">Code postal invalide</span>
                                </div>
                            </div>
                            <div>
                                <!-- Complément d'adresse -->
                                <div class="input-box">
                                    <label class="input-label" for="complement_adresse">Complément d'adresse</label>
                                    <input class="input-field" type="text" id="complement_adresse" name="complement_adresse" placeholder="Entrez votre complément d'adresse">
                                    <span class="input-error-message">Complément d'adresse invalide</span>
                                </div>
                                <!-- Ville -->
                                <div class="input-box">
                                    <label class="input-label" for="ville">Ville</label>
                                    <input class="input-field" type="text" id="ville" name="ville" placeholder="Entrez votre ville">
                                    <span class="input-error-message">Ville invalide</span>
                                </div>
                            </div>
                        </div>
                        <!-- Btn -->
                        <input class="button form-button" type="submit" value="Valider">
                    </form>
                <?php elseif ($actionSelect == "Mes paramètres") :?>
                    <div class="normal_box">
                        <div class="titel_box">
                            <span class="Black_police_65">Mes paramètres</span>
                            <span class="Black_police_45">Gérer les cookies</span>
                        </div>
                        <div class = "cookie_space">
                            <div class = "information_cookie_space">
                                <p class=Gray_police_40 style="max-width : 500px;">Nous utilisons des cookies pour améliorer votre expérience sur notre site. Ces cookies sont essentiels au bon fonctionnement du site et nous aident à comprendre comment vous l'utilisez. En continuant à naviguer, vous acceptez l'utilisation de ces cookies.</p>
                                <div class="button_cookie_space">
                                    <a href="" class="White_police_40 small-size button">Accepter les cookies</a>
                                    <a href="" class="Red_police_55 small-size clear_button">Refuser les cookies</a>
                                </div>
                            </div>
                            <img src="/frontend/assets/icons/cookie.png" alt="" class="image_cookie">
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </main>

    <?php include 'frontend/components/footer.php'; ?>

</body>
<script src="/frontend/scripts/commands.js"></script>

</html>