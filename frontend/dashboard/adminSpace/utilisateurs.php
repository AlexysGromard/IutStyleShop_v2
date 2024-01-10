<div class="large_box">
    <span class="Black_police_65">Base de données utilisateurs</span>                        

    <table class="table_admin">

        <thead>
            <tr>
                <th class="White_police_35" >N°</th>
                <th class="White_police_35" >Mail</th>
                <th class="White_police_35" >Nom</th>
                <th class="White_police_35" >Prénom</th>
                <th class="White_police_35" >Adresse</th>
                <th class="White_police_35" >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $array_user as $element) : ?>
            <?php $listvalues= $element->getArrayOfImportantAttribut()?>
            <tr>
                <td class="Black_police_40"><?= $listvalues["N°"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Mail"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Nom"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Prénom"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Adresse"] ?></td>
                <td class=action_space>
                    <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="crayon rouge"></a>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="poubelle rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>