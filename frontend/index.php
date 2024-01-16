<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IutStyleShop</title>
    <?php include 'common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/carousel.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
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
            <a class="header-products-btn" href="/products">
                Afficher tous les articles
                <img src="/frontend/assets/icons/grid.png" alt="Grid">
            </a>
        </div>
        <div id="products">
            <?php
                include_once 'controller/components.php';
                use controller;
                foreach($bestArticles as $article){
                    $img = ""; 
                    if (count($article->getImages())>=1){
                        $img = $article->getImages()[0];
                    }
                    generateArticleComponent(
                        $id = $article->getId(),
                        $imageSrc = $img,
                        $title = $article->getNom(),
                        $starCount = intval($article->getNotes()),
                        $availability = $article->getDisponible(),
                        $promotion = $article->getPromo(),
                        $price = $article->getPrix()
                    );
                    
                }
                
            ?>
        </div> 
    </section>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/carousel.js"></script>
<script src="/frontend/scripts/clickOnProduct.js"></script>

</html>
