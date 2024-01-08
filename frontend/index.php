<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/carousel.css">
</head>
<body>
    <!-- Header -->
    <?php include 'components/header.php'; ?>
    <!-- Carrousel -->
    <section id="carousel-section">
        <div class="carousel">
            <a class="prev"><img src="/frontend/assets/icons/arrow.png" alt="Previous button"></a>
            <figure class="carousel-images">
                <a href="#"><img src="/frontend/assets/images/carousel/promo_1.png" alt="Promo -50% sur les T-Shirts."></a>
                <a href="#"><img src="/frontend/assets/images/carousel/promo_2.png" alt="Nouveautés."></a>
                <a href="#"><img src="/frontend/assets/images/carousel/promo_3.png" alt="T-Shirt Nike"></a>
            </figure>
            <a class="next"><img src="/frontend/assets/icons/arrow.png" alt="Next button"></a>
        </div>    
    </section>
    <!-- Section products -->
    <section id="bestsellers-section">
        <div id="header-products">
            <!-- Section title -->
            <div class="section-title">
                <span class="section-title-name">Meilleures ventes</span>
                <span class="section-title-results">3 articles</span>
            </div>
            <!-- Btn 'All products' -->
            <a class="header-products-btn" href="/frontend/all-products/">
                Afficher tous les articles
                <img src="/frontend/assets/icons/grid.png" alt="Grid">
            </a>
        </div>
        <div id="products">
            <!-- Article 1 -->
            <div id="sweatshirt_iut_rouge" class="boite_article"> 
                <img class="image" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="Sweat Rouge IUT">
                <div class="bas_article">
                    <span class="medium-important-text product-btn">Sweat Rouge IUT</span>
                    <div class="stars">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                    </div>
                    <div class="availablity">
                        <span class="small-text">Disponibilité :</span>
                        <span class="small-text green">En stock</span>
                    </div>
                    <div class="price-btn">
                        <span class="price">39.99€</span>
                        <a class="button medium-size basic-text btn-add-card" href="#">Ajouter au panier</a>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div id="mug_iut" class="boite_article"> 
                <img class="image" src="/frontend/products/mug_iut/image1.png" alt="MUG Blanc IUT">
                <div class="bas_article">
                    <span class="medium-important-text product-btn">MUG Blanc IUT</span>
                    <div class="stars">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                    </div>
                    <div class="availablity">
                        <span class="small-text">Disponibilité :</span>
                        <span class="small-text green">En stock</span>
                    </div>
                    <div class="price-btn">
                        <span class="price">14.99€</span>
                        <a class="button medium-size basic-text btn-add-card" href="#">Ajouter au panier</a>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div id="tshirt_iut_rouge" class="boite_article"> 
                <img class="image" src="/frontend/products/tshirt_iut_rouge/image1.png" alt="T-Shirt Rouge IUT">
                <div class="bas_article">
                    <span class="medium-important-text product-btn">T-Shirt Rouge IUT</span>
                    <div class="stars">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                    </div>
                    <div class="availablity">
                        <span class="small-text">Disponibilité :</span>
                        <span class="small-text green">En stock</span>
                    </div>
                    <div class="price-btn">
                        <span class="price">19.99€</span>
                        <a class="button medium-size basic-text btn-add-card" href="#">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- TEST -->
    <?php
        include_once '../backend'.DIRECTORY_SEPARATOR.'DAO'.DIRECTORY_SEPARATOR.'Connection.php';

        $db = new backend\DAO\Connection();
    ?>

</body>
<script src="/frontend/scripts/carousel.js"></script>
<script src="/frontend/scripts/all-products.js"></script>
</html>
