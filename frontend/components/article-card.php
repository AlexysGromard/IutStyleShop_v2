<?php
/**
 * Cette fonction génère un composant d'article.
 * Elle prend en paramètre les informations de l'article à afficher.
 */
function generateArticleComponent(
    $id = null, // id de l'article, permet d'accéder à la page de l'article
    $imageSrc = "",
    $title = "unknown",
    $starCount = 0,
    $availability = false,
    $promotion = "0",
    $price = "0,00",
) {
    // ID validation (assuming positive integer IDs)
    $id = is_numeric($id) ? intval($id) : null;

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
    // Escape output data
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $imageSrc = htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8');
    $promotion = htmlspecialchars($promotion, ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($price, ENT_QUOTES, 'UTF-8');
    ?>

    <div data-id="<?=$id?>" class="boite_article">
        <!-- Image de l'article -->
        <img class="image" src="<?= $imageSrc ?>" alt="<?= $title ?> image">
        <div class="bas_article">
            <!-- Titre de l'article -->
            <a href="<?= $id?>" class="medium-important-text"><?= $title ?></a>
            <!-- Etoiles (note)-->
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
            <!-- Indicateur de disponibilité -->
            <div class="availablity">
                <span class="small-text">Disponibilité :</span>
                <span class="small-text <?php echo $availability ? 'green' : 'red'; ?>">
                    <?php echo $availability ? 'Disponible' : 'En rupture'; ?>
                </span>
            </div>
            <!-- Prix -->
            <div class="price-btn">
                <div class="price-div <?php if ($promotion!=0) echo "promo"?>">
                    <span>Promotion <?= $promotion ?>%</span>
                    <span class="price"><?= $price ?>€</span>
                </div>
                <!-- BTN Ajouter au panier-->
                <a class="button medium-size basic-text <?php echo $availability ?: 'disabled'?>" href="#">
                    <?php echo $availability ? 'Ajouter au panier' : 'Indisponible'; ?>
                </a>
            </div>
        </div>
    </div>
    <?php
}
// generateArticleComponent();
?>
