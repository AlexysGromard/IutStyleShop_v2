<script src="/frontend/scripts/clientSpace/commande.js"></script>

<div class="large_box" action="xx">

    <!-- hystorique commande -->
    <div class= titel_box>
        <span class="Black_police_65">Historique de vos commandes</span>
        <span class="Black_police_45">2022 - 2024</span>
    </div>
    
    <div class="all_commandes_box">
        <!-- 1er boucle for -->
            <?php foreach($array_commandes as $commande) : ?>
            <div class="all_commande_box">

                <div class="commande_box">
                    <div class = "commande_box_left">
                        <img class="first_product_image" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                        <div class="commande_text_box_left">
                            <span class="Black_police_55">Sweat rouge IUT, T-Shirt blanc IUT, ...</span>
                            <span class="Black_police_40">Commandé le <?= $commande->getDate() ?> </span>
                        </div>
                    </div>
                    <div class="commande_box_right">
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Etat de la commande</span>
                            <span class="Black_police_65"><?= $commande->getStatut() ?></span>
                        </div>
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Total de la commande</span>
                            <span class="Black_police_65" ><?= $commande->getPrix() ?></span>
                        </div>
                        <label class="drop_down_button">
                            <input type="checkbox" id="checkbox_product_<?= $commande->getId() ?>" onclick="unroll_items(<?= $commande->getId() ?>)">
                            <img src="/frontend/assets/icons/blackarrow.png" alt="x">
                        </label>
                    </div>
                </div>

                <?php foreach($commande->getArticlesCommandes() as $article_commande) : ?>
                <!-- 2ème boucle for -->
                    <div class="all_products_command box_product_<?= $commande->getId() ?>">
                       

                        
                        <div class="commande_box product_box_commande">
                            <div class = "commande_box_left">
                            <?= $article_commande->getInfoImage()?>
                                <img class="product_image_commande" src="<?= $article_commande->getInfoImage()?>" alt="">

                                <div class="commande_text_box_left">
                                    <?php $info = $article_commande->getInfoArticle()?>
                                    <span class="Black_police_60"><?=$info['nom'] ?></span>
                                    <span class="Black_police_40">Taille : <?= $article_commande->getTaille() ?></span>
                                    <span class="Black_police_40">Couleur : <?= $info['couleur'] ?></span>
                                    <span class="Black_police_40">Quantité : <?= $article_commande->getQuantite() ?></span>
                                </div>

                            </div>
                            <div class="commande_box_right product_box_left_commande">
                                <div class="commande_text_box_right">
                                    <span class="Black_police_40">Prix unitaire</span>
                                    <span class="Black_police_65"><?= $article_commande->getPrixUnitaire() ?>€</span>
                                </div>
                                <div class="commande_text_box_right">
                                    <span class="Black_police_40">Sous-total</span>
                                    <span class="Black_police_65" ><?= $article_commande->getPrixUnitaire() ?>€  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <hr />
        <?php endforeach ?>

    </div>
    
</div>
