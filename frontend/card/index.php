<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/carousel.css">
    <link rel="stylesheet" href="/frontend/styles/cart.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
    <!-- Section -->
    <section class="sections-panier">
            <!-- Section title -->
            <div class="section-title">
                <span class="section-title-name">Votre pannier</span>
                <span class="section-title-results">3 articles</span>
            </div>
            <div class="articles-payment-box">
            <div id="all-articles" class="all-articles big-size">
                <div class="title-informations-cart">
                    <div></div>
                    <div class="produits-type-small-text">Quantité</div>
                    <div class="produits-type-small-text">Sous-total</div>
                    <img src="/frontend/assets/icons/poubelle-de-recyclage.png">
                </div>
            </div> 

            <div class="normal_box_payment payment-size">
                <div class="first-section-payment">
                    <div class="payment-title-text">Montant total de vos produits</div>
                    <div class="payment-text dark-grey">Prix TTC</div>
                </div>
                <div class="line"></div>
                <div class="second-section-payment">
                    <div class="text-espace"><div class="payment-text grey">Sous-total</div><div id="st" class="payment-text text-weight-price">0,00€</div></div>
                    <div class="text-espace"><div class="payment-text grey">Taxes</div><div id="taxes" class="payment-text text-weight-price">0,00€</div></div>
                    <div class="text-espace"><div class="payment-text grey">Code promotionnel</div><div class="payment-text text-weight-price">0,00€</div></div>
                </div>
                <div class="line"></div>
                <div class="third-section-payment">
                    <div class="payment-text">Code promo</div>
                    <div class="boite-code-promo">
                        <form action="" method="">
                            <input class="code-promo" type="text" name="code" placeholder="Renseigner votre code ici">
                            <button class="button">Valider</button>
                        </form>

                    </div>
                </div>
                <div class="line"></div>
                <div class="final-section-payment">
                    <div class="text-espace">
                        <div>
                            <div class="payment-text">Prix total</div>
                            <div class="payment-scearch-text">Ce prix inclus les remises</div>
                        </div>
                        <div class="price">0,00€</div>
                    </div>
                </div>
                <a class="payment-size button important-text" href="#">Passer la commande</a>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/all-products.js"></script>
</html>
