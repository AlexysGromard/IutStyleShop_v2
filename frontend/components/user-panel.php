<div id="user-panel-container">
    <div id="user-informations">
        <div id="user-picture-container">
            <?php
                if ($userGender === "N") {
                    $photoPath = "/frontend/assets/icons/artichoke.png";
                } else {
                    $photoPath = ($userGender === "M") ? "/frontend/assets/icons/user-man.png" : "/frontend/assets/icons/user-woman.png";
                }
            ?>
            <img src="<?php echo $photoPath; ?>" alt="Photo de profil">
        </div>
        <span id="user-name"><?= $userName; ?></span>
        <span id="user-id">N° de<?php echo ($userType === "client" ? " client" : " user"); ?> : <?= $userId; ?></span>
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
        <?php if($userRole == "admin" && $userType=="client"):?>
        <a class="clear_button Red_police_55" href="/user/admin_space/utilisateurs">Mode Admin</a>
        <?php elseif($userRole == "admin" && $userType=="admin"):?>
        <a class="clear_button Red_police_55" href="/user/dashboard/informations">Mode Client</a>
        <?php endif; ?>
        <!-- Deconnexion -->
        <button class="button" id="logout-button" onclick="showLogoutPopup()">Déconnexion</button>
    </div>
</div>
