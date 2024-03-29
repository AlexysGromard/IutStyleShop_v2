
<div class="large_box">
    <?php if ($commande == null) : ?>
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
                <?php foreach($array_user as $ElementUser):?>
                    <?php $array_commandes = $ElementUser->getAllCommande();?>
                    <?php foreach( $array_commandes as $element) : ?>
                        <tr>
                            <td><a href="xx" class="Red_police_50"><?=$element->getId()?></a></td>
                            <td><a href="xx" class="Red_police_50"><?= $ElementUser->getId()?></a></td>
                            <td class="Black_police_40"><?=$element->getDate()?></td>
                            <td><a href="xx" class="Red_police_50"><?php
                            if ($element->getStatut() == -1){
                                echo "Annule";
                            }elseif ($element->getStatut() == 1){
                                echo "Termine";
                            }else{
                                echo $element->getStatut();
                            }

                            ?></a></td>
                            <td class="Black_police_40"><?=$element->getPrix()."€"?></td>
                            <td class=action_space>
                            <a href="/user/admin_space/commandes/<?=$element->getId()?>">
                            <img src="/frontend/assets/icons/oeil-ouvert.png" alt="oeil ouvert">
                            </a>

                                <?php if ($element->getStatut() != "Terminé"  && $element->getStatut() != "Annule" && $element->getStatut() != "1"  && $element->getStatut() != "-1"):?>
                                    <a href="/user/ValideCommande/<?=$element->getId()?>"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                    
                                    <a href="/user/delCommande/<?=$element->getId()?>"><img src="/frontend/assets/icons/bin.png" alt="poubelle rouge"></a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php elseif (gettype($commande)=="object"):?>
        <span class="Black_police_65">Commande N°<?=$commande->getId()?> du <?=$commande->getDate() ?> </span>

        <div class="all_commande_box">
                <div class="all_commande_box">
                    <div class="commande_box">
                        <div class = "commande_box_left">
                            <img class="first_product_image" src="<?= $commande->getArticlesCommandes()[0]->getInfoImage() ?>" alt="">
                            <div class="commande_text_box_left">
                                <span class="Black_police_55">
                                    <?php
                                        $res = $commande->getArticlesCommandes();

                                        if ( count($res) >= 3 ){

                                            echo $res[0]->getInfoArticle()['nom'] . ", " .  $res[1]->getInfoArticle()['nom'] . ", ...";
                                        
                                        } elseif (count($res) == 2){
                                            echo $res[0]->getInfoArticle()['nom'] . ", " .  $res[1]->getInfoArticle()['nom'] ;

                                        } else {
                                            echo $res[0]->getInfoArticle()['nom'] ;

                                        }
                                    ?>
                                </span>
                                <span class="Black_police_40">Commandé le <?= $commande->getDate() ?> </span>

                            </div>


                        </div>
                        

                        <div class="commande_box_right">
                            <div class="commande_text_box_right">
                                <span class="Black_police_40">Etat de la commande</span>
                                <span class="Black_police_65">                                <?php
                                    if ($commande->getStatut() == -1){
                                        echo "Annule";
                                    }elseif ($commande->getStatut() == 1){
                                        echo "Termine";
                                    }else{
                                        echo $commande->getStatut();
                                    }
                                ?></span>
                            </div>
                            <div class="commande_text_box_right">
                                <span class="Black_police_40">Total de la commande</span>
                                <span class="Black_police_65"><?= number_format($commande->getPrix(), 2) ?>€</span>
                            </div>
                            <a href="/user/admin_space/commandes" style="font-size: 20px;">
                                &times;
                            </a>
                        </div>
                    </div>
                <!-- 2ème boucle for -->

                <?php foreach($commande->getArticlesCommandes() as $article_commande) : ?>
                    <!-- 2ème boucle for -->

                    <div class="all_products_command box_product_<?= $commande->getId() ?>">

                        


                        <div class="commande_box product_box_commande">
                            <div class = "commande_box_left">

                                <img class="product_image_commande" src="<?=$article_commande->getInfoImage()?>" alt="">


                                <div class="commande_text_box_left">
                                    <?php $info = $article_commande->getInfoArticle()?>
                                    <span class="Black_police_60"><?=$info['nom'] ?></span>
                                    <?php
                                    $taille = $article_commande->getTaille();

                                    if ($taille !== null) {
                                        echo '<span class="Black_police_40">Taille : ' . $taille . '</span>';
                                    }
                                    ?>
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
                                    <span class="Black_police_65"><?= number_format($article_commande->getPrixUnitaire(), 2) ?>€</span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
        </div>
    <?php endif; ?>
</div>