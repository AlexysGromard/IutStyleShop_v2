<div class="article_rectangle big-size">
    <div class="image_article_panier small-size">
        <img class="image_article_panier small-size" src="<?php echo $articleImage; ?>">
    </div>
    <div class="informations-article">
        <div class="dispo_rect_article">
            <a href="/article/visuel/<?= $articleId; ?>" class="medium-important-text"><?php echo $articleName; ?></a>
            <div class="availablity">
                <div class="small-text">Disponibilité :</div>
                <div class="small-text <?php echo $disponibility ? 'green' : 'red'; ?>"><?php echo $disponibility ? 'Disponible' : 'En rupture'; ?></div>
            </div>
            <div class="small-text">Taille : <?php echo $articleSize; ?></div>
            <div class="small-text">Couleur : <?php echo $articleColor; ?></div>
        </div>
        <div class="article-actions-container">
            <select class="quantity-size clickable">
                <?php for ($i = max(1, $articleQuantity - 2); $i <= $articleQuantity + 2; $i++) { ?>
                    <option <?php echo $i == $articleQuantity ? "selected": "";?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <div class="price2"><?php echo number_format($articlePrice, 2, ',', ' '); ?>€</div>
            <a href="/card/removeArticleFromCard/<?=$panierArticleEntity[0]."/".$panierArticleEntity[1]."/".$panierArticleEntity[2]?>">
                <img src="/frontend/assets/icons/cross.svg" class="cross clickable">
            </a>
        </div>
    </div>
</div>
