<head>
    <?php include_once '../common-includes.php'; ?>
</head>
<?php
/**
 * Cette fonction génère un composant d'article dans le panier.
 * Elle prend en paramètre les informations de l'article à afficher.
 */
function generateCartItemComponent(
    $articleName = "Unknown",
    $articleSize = "Unknown",
    $disponibility = false,
    $articleQuantity = 0,
    $articlePrice = 0,
    $articleColor = "Unknown",
    $articleImage = "Unknown"
) {
    // Quantity must be number >= 0 and <= 99 
    if (!is_numeric($articleQuantity) || $articleQuantity < 0) {
        $articleQuantity = 0;
    } else if ($articleQuantity > 99) {
        $articleQuantity = 99;
    }
    // Price must be number >= 0
    if (!is_numeric($articlePrice) || $articlePrice < 0) {
        $articlePrice = 0;
    }
    // Check if articleSize is a string in XS, S, M, L, XL, XXL
    $articleSize = strtoupper($articleSize);
    $articleSize = in_array($articleSize, ["XS", "S", "M", "L", "XL", "XXL"]) ? $articleSize : "Unknown";
    // Escape output data
    $articleName = htmlspecialchars($articleName, ENT_QUOTES, 'UTF-8');
    $articleSize = htmlspecialchars($articleSize, ENT_QUOTES, 'UTF-8');
    $articleColor = htmlspecialchars($articleColor, ENT_QUOTES, 'UTF-8');
    $articleImage = htmlspecialchars($articleImage, ENT_QUOTES, 'UTF-8');

?>
<div class="article_rectangle big-size">
    <div class="image_article_panier small-size">
        <img class="image_article_panier small-size" src="../products/<?php echo $articleImage; ?>">
    </div>
    <div class="informations-article">
        <div class="dispo_rect_article">
            <a href="#" class="medium-important-text"><?php echo $articleName; ?></a>
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
            <a href="#">
                <img src="../assets/icons/cross.svg" class="cross clickable">
            </a>
        </div>
    </div>
</div>
<?php
}
generateCartItemComponent("Jean", "S", true ,3, 25.99,"Rouge" ,"tshirt_iut_rouge/image1.png")
?>
