<?php if ($codePromo==null) :?>
<div class="large_box">
    <div class="title_space">
        <span class="Black_police_65">Base de données codes promotionnel</span>
        <a href="/user/admin_space/codes_promotionnel/nouveauCodePromotionnel" class="White_police_40 small-size button">Ajouter un code</a>
    </div>

    <table class="table_admin">
        <thead>
            <tr>
                <th class="White_police_35" >N°</th>
                <th class="White_police_35" >Code promotionnel</th>
                <th class="White_police_35" >Réduction (en %)</th>
                <th class="White_police_35" >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $array_code_promo as $code) : ?>
            <tr>
                
                <td><a href="xx" class="Red_police_50"><?= $code->getId(); ?></a></td>
                <td class="Black_police_40"><?= $code->getCode(); ?></td>
                <td class="Black_police_40"><?= $code->getPromo()."%"; ?></td>
                <td class=action_space>
                    <a href=<?= "codes_promotionnel/".$code->getId(); ?>><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<?php elseif ($codePromo=="nouveauCodePromotionnel"): ?>
    <form class="large_box" action="">
        <span class="Black_police_65">Code promotionnel N°xxx</span>

        <div class="large_inputText_space">
            <label for="article-name" class="Black_police_55">Code promotionnel</label>
            <input id="Code promotionnel" placeholder="Mon nom de code" type="text" class="sidebar">
        </div>  
        <div class="large_inputText_space">
            <label for="reduction" class="Black_police_55">Réduction (en %)</label>
            <input id="reduction" placeholder="Réduction (en %)" type="text" class="sidebar">
        </div>
        <button type="submit" class="medium-size button basic-text button_check">Ajouter code promotionnel</button>
    </form>
<?php elseif (gettype($codePromo)=="object"):?>
    <form class="large_box" action="">
        <span class="Black_police_65">Code promotionnel N°<?=$codePromo->getId();?></span>

        <div class="large_inputText_space">
            <label for="article-name" class="Black_police_55">Code promotionnel</label>
            <input id="Code promotionnel" placeholder="Mon nom de code" type="text" class="sidebar" initval=<?=$codePromo->getCode()?>>
        </div>  
        <div class="large_inputText_space">
            <label for="reduction" class="Black_police_55">Réduction (en %)</label>
            <input id="reduction" placeholder="Réduction (en %)" type="text" class="sidebar" initval=<?=$codePromo->getPromo()?>>
        </div>
        <button type="submit" class="medium-size button basic-text button_check">Modifier code promotionnel</button>
    </form>
    <script src="/frontend/scripts/pre_fill.js"></script>

<?php endif; ?>