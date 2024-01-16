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
            <?php foreach( $array_user as $user) : ?>
            <tr>
                <td class="Black_police_40"><?= $user->getId() ?></td>
                <td class="Black_police_40"><?= $user->getEmail() ?></td>
                <td class="Black_police_40"><?= $user->getNom() ?></td>
                <td class="Black_police_40"><?= $user->getPrenom() ?></td>
                <td class="Black_police_40"><?= $user->getAdresse() ?></td>
                <td class=action_space>
                    <?php if ($user->getId() != 1) :?>
                    <a href="/user/delUser/<?=$user->getId()?>"><img src="/frontend/assets/icons/bin.png" alt="poubelle rouge"></a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>