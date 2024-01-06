<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur - IutStyleShop</title>
    <link rel="stylesheet" href="/frontend/styles/variables.css">
    <link rel="stylesheet" href="/frontend/styles/general.css">
    <link rel="stylesheet" href="/frontend/styles/general2.css">
    <link rel="stylesheet" href="/frontend/styles/homePage.css">
    <link rel="stylesheet" href="/frontend/styles/police.css">
    <link rel="stylesheet" href="/frontend/styles/admin.css">
    <link rel="stylesheet" href="/frontend/styles/user.css">
    <?php include 'frontend/components/table.php'; ?>
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
        

    <main class="admin_general">
        <span class="Black_police_70"> Espace Administrateur</span>

        <div class = "admin_general_element_box">

            <!-- left -->
            <?php include "frontend/components/user-panel.php" ?>
            <?php generateUserPanelComponent($actionSelect, $personne->nom." ".$personne->prenom, $personne->id, $personne->genre, $personne->role); ?>


            <!-- right -->
            <div class="user_right_box">
                <div class="large_box">
                    <?php if ($actionSelect == "Base de données utilisateurs") :?>
                    
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
                                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php elseif ($actionSelect == "Base de données commandes") :?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </main>


    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
    
</body>
</html>