<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/admin.css">
    <?php include 'frontend/components/table.php'; ?>
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
        

    <main class="admin_general">
        <span class="Black_police_70"> Espace Administrateur</span>

        <div class = "admin_general_element_box">

            <!-- left -->
            <?php include "frontend/components/user-panel.php" ?>
            <?php generateUserPanelComponent($actionSelect, $personne->nom." ".$personne->prenom, $personne->id, $personne->genre, "admin"); ?>


            <!-- right -->
            <div class="user_right_box">
                <div class="large_box">
                    <?php if ($actionSelect == "Base de données utilisateurs") :?>
                    
                        <span class="Black_police_65">Base de données utilisateurs</span>                        

                        <table class="table_admin">
                        
                            <thead>
                                <tr>
                                    <th class="White_police_35" >N°</th>
                                    <th class="White_police_35" >Mail</th>
                                    <th class="White_police_35" >Nom</th>
                                    <th class="White_police_35" >Prénom</th>
                                    <th class="White_police_35" >Adresse</th>
                                    <th class="White_police_35" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $array_user as $element) : ?>
                                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                                <tr>
                                    <td class="Black_police_40"><?= $listvalues["N°"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Mail"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Nom"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Prénom"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Adresse"] ?></td>
                                    <td class=action_space>
                                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php elseif ($actionSelect == "Base de données commandes") :?>

                        <?php if ($numcommande == null) : //modifier en juste commande?>
                            <span class="Black_police_65">Base de données commandes</span>

                            <table class="table_admin">
                            
                                <thead>
                                    <tr>
                                        <th class="White_police_35" >N°</th>
                                        <th class="White_police_35" >N° Utilisateur</th>
                                        <th class="White_police_35" >Date</th>
                                        <th class="White_police_35" >Statut</th>
                                        <th class="White_police_35" >Prix</th>
                                        <th class="White_police_35" >Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $array_commandes as $element) : ?>
                                    <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                                    <tr>
                                        <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                                        <td><a href="xx" class="Red_police_50"><?= $listvalues["N° Utilisateur"] ?></a></td>
                                        <td class="Black_police_40"><?= $listvalues["Date"] ?></td>
                                        <td><a href="xx" class="Red_police_50"><?= $listvalues["Statut"] ?></a></td>
                                        <td class="Black_police_40"><?= $listvalues["Prix"] ?></td>
                                        <td class=action_space>
                                            <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                            <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        <?php else: ?>
                            <span class="Black_police_65">Commande N°<?=$commande->id?> appartenant à xxxxx xxxxx du <?=$commande->date ?> </span>

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
                                    </div>
                                </div>
                                <!-- 2ème boucle for -->
                                <div class=all_products_command>
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
                        <?php endif; ?>
                    <?php elseif ($actionSelect == "Base de données articles") :?>
                        <span class="Black_police_65">Base de données articles</span>                        

                        <table class="table_admin">
                            <thead>
                                <tr>
                                    <th class="White_police_35" >N°</th>
                                    <th class="White_police_35" >Nom</th>
                                    <th class="White_police_35" >Catégorie</th>
                                    <th class="White_police_35" >Genre</th>
                                    <th class="White_police_35" >Notes</th>
                                    <th class="White_police_35" >En catalogue</th>
                                    <th class="White_police_35" >Description</th>
                                    <th class="White_police_35" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $array_articles as $element) : ?>
                                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                                <tr>
                                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                                    <td class="Black_police_40"><?= $listvalues["Nom"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Catégorie"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Genre"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Notes"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["En catalogue"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Description"] ?></td>
                                    <td class=action_space>
                                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php elseif ($actionSelect == "Base de données avis") :?>
                        <span class="Black_police_65">Base de données avis</span>

                        <table class="table_admin">
                            <thead>
                                <tr>
                                    <th class="White_police_35" >N°</th>
                                    <th class="White_police_35" >N° Utilisateur</th>
                                    <th class="White_police_35" >N° Article</th>
                                    <th class="White_police_35" >Note</th>
                                    <th class="White_police_35" >Description</th>
                                    <th class="White_police_35" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $array_avis as $element) : ?>
                                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                                <tr>
                                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                                    <td class="Black_police_40"><?= $listvalues["N° Utilisateur"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["N° Article"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Note"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Description"] ?></td>
                                    <td class=action_space>
                                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php elseif ($actionSelect == "Base de données codes promotionnel") :?>
                        <span class="Black_police_65">Base de données codes promotionnel</span>

                        <table class="table_admin">
                            <thead>
                                <tr>
                                    <th class="White_police_35" >N°</th>
                                    <th class="White_police_35" >Code promotionnel</th>
                                    <th class="White_police_35" >Réduction (en %)</th>
                                    <th class="White_police_35" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $array_avis as $element) : ?>
                                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                                <tr>
                                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                                    <td class="Black_police_40"><?= $listvalues["Code promotionnel"] ?></td>
                                    <td class="Black_police_40"><?= $listvalues["Réduction (en %)"] ?></td>
                                    <td class=action_space>
                                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </main>


    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
    
</body>
</html>