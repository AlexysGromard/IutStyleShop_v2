

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

