<?php
function generateArticleComponent(
    $imageSrc = "",
    $title = "unknown",
    $starCount = 0,
    $availability = "unknown",
    $promotion = "0",
    $price = "0,00",
) {
    // Stars count must be between 0 and 5
    if ($starCount < 0) {
        $starCount = 0;
    } else if ($starCount > 5) {
        $starCount = 5;
    }

    // Price must be a number with 2 decimals
    if (!is_numeric($price)) {
        $price = "0,00";
    } else {
        $price = number_format($price, 2, ',', ' ');
    }

    // Promotion text must be a number between 0 and 100
    if (!is_numeric($promotion) || $promotion < 0 || $promotion > 100) {
        $promotion = "0";
    }
    ?>

    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">

    <div class="boite_article">
        <img class="image" src="<?= $imageSrc ?>" alt="<?= $title ?> image">
        <div class="bas_article">
            <span class="medium-important-text"><?= $title ?></span>
            <div class="stars">
                <?php
                for ($i = 0; $i < round($starCount); $i++) {
                    ?>
                        <img alt="Etoile Jaune" src="/frontend/assets/icons/marquer-comme-star-preferee.svg">
                    <?php
                }
                for ($i = 0; $i < round(5 - $starCount); $i++) {
                    ?>
                        <img alt="Etoile Gris" src="/frontend/assets/icons/marquer-comme-star-pas-preferee.svg">
                    <?php
                }
                ?>
            </div>
            <div class="availablity">
                <span class="small-text">Disponibilité :</span>
                <span class="small-text green"><?= $availability ?></span>
            </div>
            <div class="price-btn">
                <div class="price-div <?php if ($promotion!=0) echo "promo"?>">
                    <span>Promotion <?= $promotion ?>%</span>
                    <span class="price"><?= $price ?>€</span>
                </div>
                <a class="button medium-size basic-text" href="#">Ajouter au panier</a>
            </div>
        </div>
    </div>
    <?php
}
// generateArticleComponent();
?>
