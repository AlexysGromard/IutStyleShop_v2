<head>
    <?php include_once "../common-includes.php"; ?>
    <link rel="stylesheet" href="/frontend/styles/user.css">
</head>
<?php
function generateUserPanelComponent(
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
    $userId = is_numeric($userId) ? intval($userId) : null;

    // Gender must be "M" or "F"
    $userGender = in_array($userGender, ["M", "F"]) ? $userGender : "Unknown";

    // User type must be "admin" or "client"
    $userType = in_array($userType, ["admin", "client"]) ? $userType : "Unknown";

    // Actions list
    $actions = [
        "admin" => [
            "Base de données utilisateurs" => "#",
            "Base de données commandes" => "#",
            "Base de données articles " => "#",
            "Base de données des avis" => "#",
            "Base de codes promotionnel" => "#"
        ],
        "client" => [
            "Mes informations" => "#",
            "Mes commandes" => "#",
            "Mon adresse" => "#",
            "Mes paramètres" => "#"
        ]
    ];
?>

<div id="user-panel-container">
    <div id="user-informations">
        <div id="user-picture-container">
            <?php
                $photoPath = ($userGender === "M") ? "../assets/icons/user-man.png" : "../assets/icons/user-woman.png";
            ?>
            <img src="<?php echo $photoPath; ?>" alt="Photo de profil">
        </div>
        <span id="user-name"><?php echo $userName; ?></span>
        <span id="user-id">N° de<?php echo ($userType === "client" ? " client" : " user"); ?> : <?php echo $userId; ?></span>
    </div>
    <div id="user-actions">
        <!-- Liste des actions -->
        <ul id="user-actions-list">
            <?php foreach ($actions[$userType] as $actionName => $actionLink) : ?>
                <li class="user-actions-link"><a href="<?php echo $actionLink; ?>"><?php echo $actionName; ?></a></li>
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
generateUserPanelComponent("Jean", 4364801, "M", "admin");
?>