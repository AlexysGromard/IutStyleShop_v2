<!-- Message prevention -->
<div class="warning_message">
    <span>Ce site étant une version de démonstration, les informations ne sont pas réelles. Merci de ne pas renseigner de données sensibles.</span>
</div>
<!-- information personnel -->
<form class="large_box" action="/user/updateUserInformations" method="POST">
    <span class="Black_police_65">Informations personnelles</span>
    <div class="civility_choice_space">
        <!-- Genre -->
        <div class="input-box">
            <span class="input-label">Civilité</span>
            <!-- Input radio -->
            <div class="input-radio-choices">
                <!-- Homme -->
                <div class="input-radio-element">
                    <input value="M" type="radio" name="civility" id="man" <?php echo $personne->getGenre()=='M'? "checked" : "";?> onclick="checkedUpdatePersonalInfo('civility',this.value,'button-civilite')">
                    <label class="radio-label" for="man">Homme</label>
                </div>
                <!-- Femme -->
                <div class="input-radio-element">
                    <input value="W" type="radio" name="civility" id="women" <?php echo $personne->getGenre()=='W' ? "checked" : "";?> onclick="checkedUpdatePersonalInfo('civility',this.value,'button-civilite')">
                    <label class="radio-label" for="women">Femme</label>
                </div>
                <!-- Autre -->
                <div class="input-radio-element">
                    <input value="N" type="radio" name="civility" id="other" <?php echo $personne->getGenre()=='N' ? "checked" : "";?> onclick="checkedUpdatePersonalInfo('civility',this.value,'button-civilite')">
                    <label class="radio-label" for="other">Ne souhaite pas se prononcer</label>
                </div>
            </div>
            <span class="input-error-message <?php echo (isset($_SESSION['errors']["civility"]) && $_SESSION['errors']["civility"]) ? "active" : ""; ?>">Genre incomplet</span>
        </div>
    </div>
    <div class="square_of_2">
        <div>
            <!-- Nom -->
            <div class="input-box">
                <label class="input-label" for="lastname">Nom</label>
                <input required class="input-field sidebar" type="text" id="lastname" name="lastname" placeholder="Entrez votre nom" initval="<?= $personne->getNom();?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["lastname"]) && $_SESSION['errors']["lastname"]) ? "active" : ""; ?>">Nom invalide</span>
            </div>
            <!-- Prénom -->
            <div class="input-box">
                <label class="input-label" for="firstname">Prénom</label>
                <input required class="input-field sidebar" type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom" initval="<?= $personne->getPrenom();?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["firstname"]) && $_SESSION['errors']["firstname"]) ? "active" : ""; ?>">Prénom invalide</span>
            </div>
        </div>
        <div>
            <!-- Email -->
            <div class="input-box">
                <label class="input-label" for="email">Adresse mail</label>
                <input required class="input-field sidebar" type="email" id="email" name="email" placeholder="Entrez votre adresse mail" initval="<?= $personne->getEmail(); ?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["email"]) && $_SESSION['errors']["email"]) ? "active" : ""; ?>">Adresse mail invalide</span>
            </div>
            <!-- Téléphone -->
            <div class="input-box">
                <label class="input-label" for="phone">Numéro de téléphone</label>
                <input class="input-field sidebar" type="tel" id="phone" name="tel" placeholder="06 00 00 00 00" initval="<?= $personne->getTelephone();?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["tel"]) && $_SESSION['errors']["tel"]) ? "active" : ""; ?>">Numéro de téléphone invalide</span>
            </div>
        </div>
    </div>

    <button id="button-civilite" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
</form>

<!-- modification password -->
<form class="large_box" action="/user/updateUserPassword" method="POST">
    <span class="Black_police_65">Changer de mot de passe</span>
    <div class="input_password_space">
        <!-- Mot de passe actuel -->
        <div class="input-box">
            <label class="input-label" for="currentpasswords">Mot de passe actuel</label>
            <input required class="input-field sidebar" type="password" id="currentpasswords" name="currentpasswords" placeholder="Entrez votre mot de passe actuel" initval="" oninput="checkedUpdateChangePassword(this.id,this.value,'ChangePassword')" required>
            <span class="input-error-message <?php echo (isset($_SESSION['errors']["old_password"]) && $_SESSION['errors']["old_password"]) ? "active" : ""; ?>">Mot de passe actuel invalide</span>
        </div>
        <!-- Nouveau mot de passe -->
        <div class="input-box">
            <label class="input-label" for="newpasswords">Nouveau mot de passe</label>
            <input required class="input-field sidebar" type="password" id="newpasswords" name="newpasswords" placeholder="Entrez votre nouveau mot de passe" initval="" oninput="checkedUpdateChangePassword(this.id,this.value,'ChangePassword')" required>
            <span class="input-error-message <?php echo (isset($_SESSION['errors']["new_password"]) && $_SESSION['errors']["new_password"]) ? "active" : ""; ?>">Nouveau mot de passe invalide</span>
        </div>
    </div>
    <button id="ChangePassword" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
</form>

<?php
    // Supprimer les variables de session d'erreur
    unset($_SESSION['errors']);
?>


<script src="/frontend/scripts/pre_fill.js"></script>
<script src="/frontend/scripts/clientSpace/informations.js"></script>