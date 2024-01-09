<div class="large_box">
    <span class="Black_police_65">Base de données avis</span>

    <table class="table_admin">
        <thead>
            <tr>
                <th class="White_police_35" >N°</th>
                <th class="White_police_35" >N° Utilisateur</th>
                <th class="White_police_35" >N° Article</th>
                <th class="White_police_35" >Note</th>
                <th class="White_police_35" >Description</th>
                <th class="White_police_35" >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $array_avis as $element) : ?>
            <?php $listvalues= $element->getArrayOfImportantAttribut()?>
            <tr>
                <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                <td class="Black_police_40"><?= $listvalues["N° Utilisateur"] ?></td>
                <td class="Black_police_40"><?= $listvalues["N° Article"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Note"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Description"] ?></td>
                <td class=action_space>
                    <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>