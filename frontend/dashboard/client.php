<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Espace utilisateur - IutStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
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
            <?php include "controller/components.php"?>
            <?php generateUserPanelComponent($actionSelect, $personne->getNom()." ".$personne->getPrenom(), $personne->getId(), $personne->getGenre(), "client"); ?>


            <!-- right -->
            <div class="user_right_box">
                <?php if ($actionSelect == "Mes informations") :?>
                    <?php require "frontend/dashboard/clientSpace/informations.php";?>

                <?php elseif ($actionSelect == "Mes commandes") :?>
                    <?php require "frontend/dashboard/clientSpace/commandes.php";?>

                <?php elseif ($actionSelect == "Mon adresse") :?>
                    <?php require "frontend/dashboard/clientSpace/adresse.php";?>

                <?php elseif ($actionSelect == "Mes paramètres") :?>
                    <?php require "frontend/dashboard/clientSpace/parametres.php";?>

                <?php endif ?>
            </div>
        </div>
    </main>

    <?php include 'frontend/components/footer.php'; ?>

</body>
</html>