<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur - IutStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <link rel="stylesheet" href="/frontend/styles/admin.css">
    <link rel="stylesheet" href="/frontend/styles/popup.css">
    
    
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
        

    <main class="admin_general">
        <span id="dashboard-title"> Espace Administrateur</span>

        <div class = "admin_general_element_box">

            <!-- left -->
            <?php include "controller/components.php"?>
            <?php generateUserPanelComponent($actionSelect, $personne->getNom()." ".$personne->getPrenom(), $personne->getId(), $personne->getGenre(), "admin",$personne->getRole()); ?>


            <!-- right -->
            <div class="user_right_box">
                
                    <?php if ($actionSelect == "Base de données utilisateurs") :?>
                        <?php require "frontend/dashboard/adminSpace/utilisateurs.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données commandes") :?>
                        <?php require "frontend/dashboard/adminSpace/commandes.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données articles") :?>
                        <?php require "frontend/dashboard/adminSpace/articles.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données avis") :?>
                        <?php require "frontend/dashboard/adminSpace/avis.php";?>

                    <?php elseif ($actionSelect == "Base de données codes promotionnel") :?>
                        <?php require "frontend/dashboard/adminSpace/codes_promotionnel.php";?>

                    <?php endif; ?>
                
            </div>
        </div>

    </main>


    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
    
</body>
</html>