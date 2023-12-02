<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - IUTStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/article.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
    <main class="article-parge">        
        <div class="article-page-left">
            <div class="article-image-box">
                <img id="active-image" src="" alt="Article" class="article-image">
                <!-- All images of the product -->
                <div id="product-images">
                    <!-- Images in JS -->
                </div>
            </div>
            <div class="acticle-info-box">
                <div>
                    <span class="acticle-name">Titre</span>
                    <div class="stars">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                        <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                    </div>
                    <span class="small-article-text">186 évaluations</span>
                </div>
                <div class="article-more-info">
                    <div>
                        <span id="price" class="acticle-prices">prix</span>
                        <span class="small-article-text">Tous les prix inclus la TVA.</span>
                    </div>
                    <span class="small-article-text">Votre article sera à récupérer sur votre campus.</span>
                    <div>
                        <span class="small-article-text">Taille:</span>
                        <select class="select-taille" name="taille" id="taille">
                            <option selected disabled value="">Selectionner</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <span class="small-article-text article-description">Description</span>

                    <a id="add-card" class="button basic-text">Ajouter au panier</a>
                </div>
            </div>
        </div>

        <div class="article-page-right">
            <button>
                <span>Partager cet article</span>
                <img src="/frontend/assets/images/partage.svg" alt="partager">
            </button>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/all-products.js"></script>
</html>