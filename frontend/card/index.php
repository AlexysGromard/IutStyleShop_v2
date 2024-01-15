<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - IutStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/carousel.css">
    <link rel="stylesheet" href="/frontend/styles/cart.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
    <!-- Section -->
    <main class="sections-panier">
            <!-- Section title -->
            <div class="section-title">
                <span class="section-title-name">Votre pannier</span>
                <span class="section-title-results"> <?php echo count($panier->getPanierArticles()); ?> article<?= count($panier->getPanierArticles()) > 1 ? "s" : "" ?></span>
            </div>
            <div class="articles-payment-box">
            <div id="all-articles" class="all-articles big-size">
                <div class="title-informations-cart">
                    <div></div>
                    <div class="produits-type-small-text">Quantité</div>
                    <div class="produits-type-small-text">Sous-total</div>
                    <img src="/frontend/assets/icons/poubelle-de-recyclage.png">
                </div>
                <!-- Articles du panier -->
                <?php
                    include_once 'controller/components.php';

                    foreach ($panier->getPanierArticles() as $article) {
                        // Récupérer l'article avec l'id
                        generateCartItemComponent(
                            $articlePanier[$article->getIdArticle()]->getNom(),
                            $article->getTaille(),
                            true,
                            $article->getQuantite(),
                            $articlePanier[$article->getIdArticle()]->getPrix(),
                            $articlePanier[$article->getIdArticle()]->getCouleur(),
                            $articlePanier[$article->getIdArticle()]->getImages()[0],
                            [$article->getIdArticle(), $article->getTaille(), $article->getQuantite()]
                        );
                    };
                
                ?>
            </div> 

            <div class="normal_box_payment payment-size">
                <div class="first-section-payment">
                    <div class="payment-title-text">Montant total de vos produits</div>
                    <div class="payment-text dark-grey">Prix TTC</div>
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
                        <div class="payment-text grey">Taxes</div>
                        <div id="taxes" class="payment-text text-weight-price">
                            <?php echo number_format($panier->getPrixTotal() * 0.2, 2); ?>€
                        </div>
                    </div>

                    <div class="text-espace">
                        <div class="payment-text grey">
                            Code promotionnel <?= isset($codePromo) && $codePromo->getPromo() != 0 ? " : ".$codePromo->getCode() : "";?>
                        </div>
                        <div class="payment-text text-weight-price">
                            <?= (isset($codePromo) && $codePromo->getPromo() != 0 )? "-".number_format($panier->getPrixTotal() * $codePromo->getPromo() / 100, 2) : "0"; ?>€
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="third-section-payment">
                    <div class="payment-text">Code promo</div>
                    <div class="boite-code-promo">
                        <form action="/card/addPromoCode" method="POST">
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
                        <div class="price">
                            <?= (isset($codePromo) && $codePromo->getPromo() != 0 ) ? number_format($panier->getPrixTotal() - $panier->getPrixTotal() * $codePromo->getPromo() / 100, 2) : number_format($panier->getPrixTotal(), 2); ?>€
                        </div>
                    </div>
                </div>
                <a class="payment-size button important-text" href="/card/payment">Passer la commande</a>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
</html>
