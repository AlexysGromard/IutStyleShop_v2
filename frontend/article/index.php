<?php
    //vérifiaction
    if (!isset($articleActual)){
        echo "BIZZARE IL N'Y A PAS D'ARTICLE";
    }else{
        echo "<pre>"; var_dump($articleActual); echo "</pre>";
    }
?>

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
                <img id=active-image class="article-image" alt="Article" src=<?= $articleActual->image ?> />
                <!-- All images of the product -->
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
<!-- script src="/frontend/scripts/all-products.js"></script-->
</html>