<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/client.css">
    <!-- link rel="stylesheet" href="/frontend/styles/carousel.css" -->
    <!-- link rel="stylesheet" href="/frontend/styles/cart.css" -->
</head>
<body>
    
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>

    <main>
        <span class="section-title-name"> Espace utilisateur</span>

        <div >
            <!-- left -->
            <div class="payment payment-size">
                <div class="box_menu_client">
                    <img class="imageClient" src="/frontend/assets/icons/client.png" alt="ImageClient">
                    <span class="section-title-name">NOM Prenom</span>
                    <span>N° de client : 1234567</span>
                </div>
                <!-- Boutton catégorie (deffinire la taille) -->
                <div>

                </div>
                <a class="payment-size button important-text" href="#">Déconnection</a>
            </div>

            <!-- right -->
            <div>

            </div>
        </div>
    </main>

    <?php include 'frontend/components/footer.php'; ?>

</body>