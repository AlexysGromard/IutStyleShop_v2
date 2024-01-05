<?php 
/**
 * Cette fonction génère un composant de commentaire.
 * Elle prend en paramètre les informations du commentaire à afficher.
 */
function generateCommentComponent(
    $name = "Unknown", 
    $rating = 0, 
    $commentText = "Error: No comment text provided."
) {
    // Rating must be between 0 and 5
    if ($rating < 0) {
        $rating = 0;
    } else if ($rating > 5) {
        $rating = 5;
    }

    // Escape output data
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $commentText = htmlspecialchars($commentText, ENT_QUOTES, 'UTF-8');
?>
    <div class="comment">
        <div class="comment-left">
            <img src="/frontend/assets/icons/user-comment.png" alt="">
        </div>
        <div class="comment-right">
            <div class="comment-details">
                <span class="comment-name"><?php echo $name; ?></span>
                <ul class="comment-stars">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $starImage = ($i <= $rating) ? "marquer-comme-star-preferee.svg" : "marquer-comme-star-pas-preferee.svg";
                        ?>
                        <li class="comment-star">
                            <img alt="Etoile <?php echo ($i <= $rating) ? 'Jaune' : 'Gris'; ?>" src="/frontend/assets/icons/<?php echo $starImage; ?>">
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <p class="comment-text"><?php echo $commentText; ?></p>
        </div>
    </div>
<?php 
}
// generateCommentComponent("Jean", 5, "<script>alert('Hello');</script>");
// generateCommentComponent("Jean", 5, "super produit");
?>