<div class="large_box">
    <span class="Black_police_65">Base de données codes promotionnel</span>

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
            <?php foreach( $array_avis as $element) : ?>
            <?php $listvalues= $element->getArrayOfImportantAttribut()?>
            <tr>
                <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                <td class="Black_police_40"><?= $listvalues["Code promotionnel"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Réduction (en %)"] ?></td>
                <td class=action_space>
                    <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>