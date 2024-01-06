<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - IUTStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/article.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
    <main class="article-main">
        <!-- Article -->
        <section id="article-section">
            <div class="article-page-left">
                <div class="article-image-box">
                    <img id=active-image class="article-image" alt="Article" src=<?= $articleActual->image ?> />
                    <!-- Toutes les images du produit -->
                    <div id="product-images">
                        <!-- Images in JS -->
                    </div>
                </div>
                <div class="acticle-info-box">
                    <div>
                        <span class="acticle-name"><?= $articleActual->nom?></span>
                        <div class="stars">
                            <!-- placement des étoile -->
                            <?php foreach (array(1,2,3,4,5) as $valeur): ?>
                            <?php if ($articleActual->notes >= $valeur): ?>

                            <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">

                            <?php else :?>
                            <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                            <?php endif ?>
                            <?php endforeach ?>
                        </div>
                        <span class="small-article-text"><?= $articleActual->nbNotation ?> évaluation(s)</span>
                    </div>
                    <div class="article-more-info">
                        <div>
                            <span id="price" class="acticle-prices"><?= $articleActual->prix ?>€</span>
                            <span class="small-article-text">Tous les prix inclus la TVA.</span>
                        </div>
                        <span class="small-article-text">Votre article sera à récupérer sur votre campus.</span>
                        <?php if ($articleActual->category != "Accessoire"): ?>
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
                        <?php endif ?>
                        <span class="small-article-text article-description"><?= $articleActual->description ?></span>

                        <a id="add-card" class="button basic-text">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            <!-- Boutton partager -->
            <div class="article-page-right">
                <button>
                    <span>Partager cet article</span>
                    <img src="/frontend/assets/images/partage.svg" alt="partager">
                </button>
            </div>

        </section>
        <!-- Recommandations -->
        <section id="recommendations-section">
            <div id="recommendations-title-box">
                <span class="section-title-name">Nous vous recommandons</span>
                <span class="section-title-results">Basé sur des articles similaires</span>
            </div>
            <div id="recommendations-articles-box">
                <?php
                    include 'frontend/components/article-card.php';
                    
                    // TODO : Implementer la fonction de récupération des articles similaires

                    generateArticleComponent(
                        $id = null,
                        $imageSrc = "/frontend/products/sweatshirt_iut_rouge/image1.png",
                        $title = "Sweat Rouge IUT",
                        $starCount = 4,
                        $availability = false,
                        $promotion = "0",
                        $price = "39.99",
                    );

                    generateArticleComponent(
                        $id = null,
                        $imageSrc = "/frontend/products/mug_iut/image1.png",
                        $title = "MUG Blanc IUT",
                        $starCount = 4,
                        $availability = false,
                        $promotion = "0",
                        $price = "14.99",
                    );

                    generateArticleComponent(
                        $id = null,
                        $imageSrc = "/frontend/products/mug_iut/image1.png",
                        $title = "MUG Blanc IUT",
                        $starCount = 4,
                        $availability = false,
                        $promotion = "0",
                        $price = "14.99",
                    );

                    generateArticleComponent(
                        $id = null,
                        $imageSrc = "/frontend/products/tshirt_iut_rouge/image1.png",
                        $title = "T-Shirt Rouge IUT",
                        $starCount = 4,
                        $availability = false,
                        $promotion = "0",
                        $price = "19.99",
                    );
                ?>
            </div>
        </section>
        <!-- Commentaires -->
        <section id="comments-section">
            <div id="comments-title-box">
                <span class="section-title-name">Commentaires</span>
                <span class="section-title-results">4 commentaires</span>
            </div>
            <div id="comments-box">
                <!-- Left part -->
                <div id="comments-left-part">
                    <!-- Titre de la partie -->
                    <span id="comment-box-title">Commentaires clients</span>
                    <!-- Etoiles de l'article -->
                    <div id="article-stars-box">
                        <div id="article-stars">
                            <!-- placement des étoile -->
                            <?php foreach (array(1,2,3,4,5) as $valeur): ?>
                            <?php if ($articleActual->notes >= $valeur): ?>

                            <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">

                            <?php else :?>
                            <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                            <?php endif ?>
                            <?php endforeach ?>
                            <span id="article-stars-text"><?= $articleActual->notes ?> sur 5</span>
                        </div>
                    </div>
                    <!-- Répartition des étoiles -->
                    <!-- TODO : Implementer la fonction de récupération des étoiles -->
                    <div id="distribution-stars-box">
                        <!-- 5 étoiles -->
                        <div class="distribution-stars-line">
                            <span class="distribution-stars-line-title">5 étoiles</span>
                            <div class="distribution-stars-line-container"><div style="width: 70%;" class="distribution-stars-line-value"></div></div>
                            <span class="distribution-stars-line-value-text">70%</span>
                        </div>
                        <!-- 4 étoiles -->
                        <div class="distribution-stars-line">
                            <span class="distribution-stars-line-title">4 étoiles</span>
                            <div class="distribution-stars-line-container"><div style="width: 20%;" class="distribution-stars-line-value"></div></div>
                            <span class="distribution-stars-line-value-text">20%</span>
                        </div>
                        <!-- 3 étoiles -->
                        <div class="distribution-stars-line">
                            <span class="distribution-stars-line-title">3 étoiles</span>
                            <div class="distribution-stars-line-container"><div style="width: 5%;" class="distribution-stars-line-value"></div></div>
                            <span class="distribution-stars-line-value-text">5%</span>
                        </div>
                        <!-- 2 étoiles -->
                        <div class="distribution-stars-line">
                            <span class="distribution-stars-line-title">2 étoiles</span>
                            <div class="distribution-stars-line-container"><div style="width: 3%;" class="distribution-stars-line-value"></div></div>
                            <span class="distribution-stars-line-value-text">3%</span>
                        </div>
                        <!-- 1 étoile -->
                        <div class="distribution-stars-line">
                            <span class="distribution-stars-line-title">1 étoile</span>
                            <div class="distribution-stars-line-container"><div style="width: 2%;" class="distribution-stars-line-value"></div></div>
                            <span class="distribution-stars-line-value-text">2%</span>
                        </div>
                    </div>
                </div>
                <!-- Right part -->
                <div id="comments-right-part">
                    <!-- Commentaires -->
                    <!-- TODO : Implementer la fonction de récupération des commentaires -->
                    <?php include_once 'frontend/components/comment.php'; 
                    
                    generateCommentComponent(
                        $name = "Jean",
                        $rating = 4,
                        $commentText = "Super article, je recommande !",
                    );

                    generateCommentComponent(
                        $name = "Jean",
                        $rating = 4,
                        $commentText = "Super article, je recommande !",
                    );

                    generateCommentComponent(
                        $name = "Jean",
                        $rating = 4,
                        $commentText = "Super article, je recommande !",
                    );
                
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<!-- script src="/frontend/scripts/all-products.js"></script-->
</html>