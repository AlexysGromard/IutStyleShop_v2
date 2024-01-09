<?php
function generateUserPanelComponent(
    $actionsSelect,
    $userName = "Unknown",
    $userId = 0,
    $userGender = "Unknown",
    $userType = "Unknown"
) {
    // Escape output data
    $userName = htmlspecialchars($userName, ENT_QUOTES, 'UTF-8');
    $userId = htmlspecialchars($userId, ENT_QUOTES, 'UTF-8');
    $userGender = htmlspecialchars($userGender, ENT_QUOTES, 'UTF-8');
    $userType = htmlspecialchars($userType, ENT_QUOTES, 'UTF-8');

    // ID validation (assuming positive integer IDs)
    $userId = is_numeric($userId) ? intval($userId) : null; // il est possible de ne pas avoir id ???

    // Gender must be "M" or "F"
    $userGender = in_array($userGender, ["M", "F"]) ? $userGender : "Unknown";

    // User type must be "admin" or "client"
    $userType = in_array($userType, ["admin", "client"]) ? $userType : "Unknown"; //il est possible de ne pas savoir ???

   
    
    // Actions list
    $actions = [
        "admin" => [
            "Base de données utilisateurs" => "/user/admin_space/utilisateurs",
            "Base de données commandes" => "/user/admin_space/commandes",
            "Base de données articles" => "/user/admin_space/articles",
            "Base de données avis" => "/user/admin_space/avis",
            "Base de données codes promotionnel" => "/user/admin_space/codes_promotionnel"
        ],
        "client" => [
            "Mes informations" => "/user/client_space/informations",
            "Mes commandes" => "/user/client_space/commandes",
            "Mon adresse" => "/user/client_space/adresse",
            "Mes paramètres" => "/user/client_space/parametres"
        ]
    ];
    
    //action selected
    if (!(($userType == "admin" && in_array($actionsSelect,array_keys($actions["admin"]))) || ($userType == "client" && in_array($actionsSelect,array_keys($actions["client"]))))){
        echo "ERREUR".$userType;
    }
?>

<div class="large_box payment-size ">
    <div id="user-informations">
        <div id="user-picture-container">
            <?php
                $photoPath = ($userGender === "M") ? "/frontend/assets/icons/user-man.png" : "/frontend/assets/icons/user-woman.png";
            ?>
            <img src="<?php echo $photoPath; ?>" alt="Photo de profil">
        </div>
        <span class="Black_police_60" id="user-name"><?php echo $userName; ?></span>
        <span class="Black_police_40" id="user-id">N° de<?php echo ($userType === "client" ? " client" : " user"); ?> : <?php echo $userId; ?></span>
    </div>
    <div id="user-actions">
        <!-- Liste des actions -->
        <ul id="user-actions-list">
            <?php foreach ($actions[$userType] as $actionName => $actionLink) : ?>

                <?php if ($actionName == $actionsSelect):?>
                    <li class="user-actions-link selected"><a href="<?php echo $actionLink; ?>"><?php echo $actionName; ?></a></li>
                <?php else: ?>
                    <li class="user-actions-link"><a href="<?php echo $actionLink; ?>"><?php echo $actionName; ?></a></li>
                <?php endif; ?>

                <?php if ($actionName !== array_key_last($actions[$userType])) : ?>
                    <hr class="user-action-separation">
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <!-- Deconnexion -->
        <a class="button" id="logout-button">Déconnexion</a>
    </div>
</div>

<?php
}
?>