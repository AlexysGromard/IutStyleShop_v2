<?php if ($article==null):?>
    <span class="Black_police_65">Base de données articles</span>                        

    <table class="table_admin">
        <thead>
            <tr>
                <th class="White_police_35" >N°</th>
                <th class="White_police_35" >Nom</th>
                <th class="White_police_35" >Catégorie</th>
                <th class="White_police_35" >Genre</th>
                <th class="White_police_35" >Notes</th>
                <th class="White_police_35" >En catalogue</th>
                <th class="White_police_35" >Description</th>
                <th class="White_police_35" >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $array_articles as $element) : ?>
            <?php $listvalues= $element->getArrayOfImportantAttribut()?>
            <tr>
                <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                <td class="Black_police_40"><?= $listvalues["Nom"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Catégorie"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Genre"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Notes"] ?></td>
                <td class="Black_police_40"><?= $listvalues["En catalogue"] ?></td>
                <td class="Black_police_40"><?= $listvalues["Description"] ?></td>
                <td class=action_space>
                    <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
<?php else:?>
<? endif; ?>