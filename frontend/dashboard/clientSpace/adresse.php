<!-- Message prevention -->
<div class="warning_message">
    <span>Ce site étant une version de démonstration, les informations ne sont pas réelles. Merci de ne pas renseigner de données sensibles.</span>
</div>
<form class="large_box" action="/user/updateUserAddress" method="POST">
    <!-- infomation sur l'adresse phisique -->
    <span class="Black_police_65">Mon adresse</span>

    <div class="square_of_2">
        <div>
            <!-- Adresse -->
            <div class="input-box">
                <label class="input-label" for="address">Adresse</label>
                <input class="input-field sidebar" type="text" id="address" name="address" placeholder="Entrez votre adresse" initval="<?= $personne->getAdresse(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonaddress')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["address"]) && $_SESSION['errors']["address"]) ? "active" : ""; ?>">Adresse invalide</span>
            </div>
            <!-- Code postal -->
            <div class="input-box">
                <label class="input-label" for="code">Code postal</label>
                <input class="input-field sidebar" type="text" placeholder="44000" id="code" name="code" initval="<?= $personne->getCodePostal(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonaddress')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["code"]) && $_SESSION['errors']["code"]) ? "active" : ""; ?>">Code postal invalide</span>
            </div>
        </div>
        <div>
            <!-- Complément d'adresse -->
            <div class="input-box">
                <label class="input-label" for="complement">Complément d'adresse</label>
                <input class="input-field sidebar" type="text" id="complement" name="additional-address" placeholder="Entrez votre complément d'adresse" initval="<?= $personne->getComplementAdresse(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonaddress')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["complement"]) && $_SESSION['errors']["complement"]) ? "active" : ""; ?>">Complément d'adresse invalide</span>
            </div>
            <!-- Ville -->
            <div class="input-box">
                <label class="input-label" for="city">Ville</label>
                <input class="input-field sidebar" type="text" id="city" name="city" placeholder="Entrez votre ville" initval="<?= $personne->getVille(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonaddress')">
                <span class="input-error-message <?php echo (isset($_SESSION['errors']["city"]) && $_SESSION['errors']["city"]) ? "active" : ""; ?>">Ville invalide</span>
            </div>
        </div>
    </div>

    <button id="buttonaddress" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
</form>

<?php
    // Supprimer les variables de session d'erreur
    unset($_SESSION['errors']);
?>

<script src="/frontend/scripts/pre_fill.js"></script>
<script src="/frontend/scripts/clientSpace/adresse.js"></script>