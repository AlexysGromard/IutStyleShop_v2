<div class="large_box">
    <span class="Black_police_65">Base de données avis</span>

    <table class="table_admin">
        <thead>
            <tr>
                <th class="White_police_35" >N° Utilisateur</th>
                <th class="White_police_35" >N° Article</th>
                <th class="White_police_35" >Note</th>
                <th class="White_police_35" >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $array_articles as $elementArticle) : ?>
            <?php $commentaires= $elementArticle->getCommantaire()?>
            <?php foreach( $commentaires as $com) : ?>
            <tr>
                <td class="Black_police_40"><?= $com->getUser(); ?></td>
                <td class="Black_police_40"><?= $elementArticle->getId(); ?></td>
                <td class="Black_police_40"><?= $com->getNote(); ?></td>
                <td class=action_space>
                    <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
