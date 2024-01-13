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
