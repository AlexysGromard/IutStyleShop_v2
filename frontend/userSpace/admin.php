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
                        <?php require "frontend/userSpace/adminSpace/utilisateurs.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données commandes") :?>
                        <?php require "frontend/userSpace/adminSpace/commandes.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données articles") :?>
                        <?php require "frontend/userSpace/adminSpace/articles.php";?>
                        
                    <?php elseif ($actionSelect == "Base de données avis") :?>
                        <?php require "frontend/userSpace/adminSpace/avis.php";?>

                    <?php elseif ($actionSelect == "Base de données codes promotionnel") :?>
                        <?php require "frontend/userSpace/adminSpace/codes_promotionnel.php";?>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    </main>


    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
    
</body>
</html>