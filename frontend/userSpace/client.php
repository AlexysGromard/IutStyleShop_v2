<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace utilisateur - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">
</head>
<body>
    
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>

    <main class = "user_general">
        <span class="Black_police_70"> Espace utilisateur</span>
        <div class = "user_general_element_box">
            <!-- left -->
            <?php include "frontend/components/user-panel.php" ?>
            <?php generateUserPanelComponent($actionSelect, $personne->nom." ".$personne->prenom, $personne->id, $personne->genre, "client"); ?>


            <!-- right -->
            <div class="user_right_box">
                <?php if ($actionSelect == "Mes informations") :?>
                    <!-- information personnel -->
                    <form class="large_box" action="xx">
                        
                        <span class="Black_police_65">Informations personnelles</span>
                        <div class="civility_choice_space">
                            <span class="Black_police_55" >Civilité</span>
                            <div>
                                <label for="civility-woman" class="radio_button_space">
                                    <input class="radioButton" type="radio" value="Femme" id="civility-woman" name="civility">
                                    <span class="Black_police_40" >Femme</span>
                                </label>
                                <label for="civility-man" class="radio_button_space">
                                    <input class="radioButton" type="radio" value="Homme" id="civility-man" name="civility">
                                    <span class="Black_police_40"  >Homme</span>
                                </label>
                                <label for="civility-none" class="radio_button_space">
                                    <input class="radioButton" type="radio" value="Ne souhaite pas se prononcer" id="civility-none" name="civility" checked>
                                    <span class="Black_police_40" >Ne souhaite pas se prononcer</span>
                                </label>
                            </div>
                        </div>              
                        <div class="square_of_2">
                            <div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="last-name">Nom</label>
                                    <input class="sidebar" type="text" placeholder="Votre nom" id="last-name" name="Nom">
                                </div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="first-name">Prénom</label>
                                    <input class="sidebar" type="text" placeholder="Prénom" id="first-name" name="Prenom">
                                </div>
                            </div>
                            <div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="mail">Adresse mail</label>
                                    <input class="sidebar" type="mail" placeholder="Votre adresse mail" id="mail" name="mail">
                                </div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="phone">Numéro de téléphone</label>
                                    <input class="sidebar" type="phone" placeholder="06 00 00 00 00" id="phone" name="tel">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>
                    </form>

                    <!-- modification password -->
                    <form class="large_box" action="xx">
                        <span class="Black_police_65">Changer de mot de passe</span>
                        <div class="input_password_space">
                            <div class="inputText_space">
                                <label class="Black_police_55" for="currentpasswords">Mot de passe actuel</label>
                                <input class="sidebar" type="password" placeholder="**************" id="currentpasswords" name="currentpasswords" minlength="8" required>
                            </div>
                            <div class="inputText_space">
                                <label class="Black_police_55" for="newpasswords">Nouveau mot de passe</label>
                                <input class="sidebar" type="password" placeholder="**************" id="newpasswords" name="newpasswords" minlength="8" required>
                            </div>
                        </div>
                        <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>

                    </form>
                <?php elseif ($actionSelect == "Mes commandes") :?>
                    <div class="large_box" action="xx">

                        <!-- hystorique commande -->
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
                                            <img src="/frontend/assets/icons/blackarrow.png" alt="">
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
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="adresse">Adresse</label>
                                    <input class="sidebar" type="text" placeholder="1 Rue du marechal joffre" id="adresse" name="adresse">
                                </div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="code">Code postal</label>
                                    <input class="sidebar" type="text" placeholder="44000" id="code" name="code">
                                </div>
                            </div>
                            <div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="complement_adresse">Complément d'adresse</label>
                                    <input class="sidebar" type="text" placeholder="Appartement B15" id="complement_adresse" name="complement_adresse">
                                </div>
                                <div class="inputText_space">
                                    <label class="Black_police_55" for="ville">Ville</label>
                                    <input class="sidebar" type="text" placeholder="Nantes" id="ville" name="ville">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>

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