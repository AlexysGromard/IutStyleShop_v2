<div class="large_box">
    <?php if ($numcommande == null) : //modifier en juste commande?>
        <span class="Black_police_65">Base de données commandes</span>

        <table class="table_admin">

            <thead>
                <tr>
                    <th class="White_police_35" >N°</th>
                    <th class="White_police_35" >N° Utilisateur</th>
                    <th class="White_police_35" >Date</th>
                    <th class="White_police_35" >Statut</th>
                    <th class="White_police_35" >Prix</th>
                    <th class="White_police_35" >Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $array_commandes as $element) : ?>
                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                <tr>
                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N° Utilisateur"] ?></a></td>
                    <td class="Black_police_40"><?= $listvalues["Date"] ?></td>
                    <td><a href="xx" class="Red_police_50"><?= $listvalues["Statut"] ?></a></td>
                    <td class="Black_police_40"><?= $listvalues["Prix"] ?></td>
                    <td class=action_space>
                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php else: ?>
        <span class="Black_police_65">Commande N°<?=$commande->id?> appartenant à xxxxx xxxxx du <?=$commande->date ?> </span>

        <div class="all_commande_box">
            <div class="commande_box">
                <div class = "commande_box_left">
                    <img class="first_product_image" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                    <div class="commande_text_box_left">
                        <span class="Black_police_55">Sweat rouge IUT, T-Shirt blanc IUT, ...</span>
                        <span class="Black_police_40">Commandé le 30 novembre 2023 </span>
                    </div>
                </div>
                <div class="commande_box_right">
                    <div class="commande_text_box_right">
                        <span class="Black_police_40">Etat de la commande</span>
                        <span class="Black_police_65">En cours de traitement</span>
                    </div>
                    <div class="commande_text_box_right">
                        <span class="Black_police_40">Total de la commande</span>
                        <span class="Black_police_65" >77,99€</span>
                    </div>
                </div>
            </div>
            <!-- 2ème boucle for -->
            <div class=all_products_command>
                <div class="commande_box product_box_commande">
                    <div class = "commande_box_left">
                        <img class="product_image_commande" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                        <div class="commande_text_box_left">
                            <span class="Black_police_60">Lorem ipsum dolor sit amet</span>
                            <span class="Black_police_40">Taille : S</span>
                            <span class="Black_police_40">Couleur : Rouge</span>
                            <span class="Black_police_40">Quantité : 1</span>
                        </div>
                    </div>
                    <div class="commande_box_right product_box_left_commande">
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Prix unitaire</span>
                            <span class="Black_police_65">39,99€</span>
                        </div>
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Sous-total</span>
                            <span class="Black_police_65" >39,99€  </span>
                        </div>
                    </div>
                </div>
                <div>
                    test
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>