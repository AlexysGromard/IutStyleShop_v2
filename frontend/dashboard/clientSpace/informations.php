<!-- information personnel -->
<form class="large_box" action="/user/updateUserInformations" method="POST">
                        
    <span class="Black_police_65">Informations personnelles</span>
    <div class="civility_choice_space">
        <span class="Black_police_55" >Civilité</span>
        <div>
            <label for="civility-man" class="radio_button_space">
                <?php
                    $input = '<input class="radioButton" type="radio" value="M" id="civility-man" name="civility" onclick="checkedUpdatePersonalInfo(\'civility\',this.value,\'button-civilite\')" ';
                    if ($personne->getGenre()=='M' ) {
                        $input.= 'checked ';
                    }
                    $input.= '/> ';
                    echo $input;

                ?>
                <span class="Black_police_40"  >Homme</span>
            </label>
            <label for="civility-woman" class="radio_button_space">
                <?php
                    $input = '<input class="radioButton" type="radio" value="W" id="civility-woman" name="civility" onclick="checkedUpdatePersonalInfo(\'civility\',this.value,\'button-civilite\')" ';
                    if ($personne->getGenre()=='W' ) {
                        $input.= 'checked ';
                    }
                    $input.= '/> ';
                    echo $input;

                    ?>
                <span class="Black_police_40" >Femme</span>
            </label>
            <label for="civility-none" class="radio_button_space">
                <?php
                    $input = '<input class="radioButton" type="radio" value="N" id="civility-none" name="civility" onclick="checkedUpdatePersonalInfo(\'civility\',this.value,\'button-civilite\')" ';
                    if ($personne->getGenre()=='N') {
                        $input.= 'checked ';
                    }
                    $input.= '/> ';
                    echo $input;

                ?>  
                <span class="Black_police_40" >Ne souhaite pas se prononcer</span>
            </label>
        </div>
    </div>              
    <div class="square_of_2">
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="last-name">Nom</label>
                <input class="sidebar" type="text" placeholder="Votre nom" id="last-name" name="lastname" initval="<?= $personne->getNom(); ?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')" >
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="first-name">Prénom</label>
                <input class="sidebar" type="text" placeholder="Prénom" id="first-name" name="firstname" initval="<?= $personne->getPrenom(); ?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')" >
            </div>
        </div>
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="mail">Adresse mail</label>
                <input class="sidebar" type="mail" placeholder="Votre adresse mail" id="mail" name="email" initval="<?= $personne->getEmail(); ?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="phone">Numéro de téléphone</label>
                <input class="sidebar" type="tel" placeholder="06 00 00 00 00" id="phone" name="tel" initval="<?= $personne->getTelephone();?>" oninput="checkedUpdatePersonalInfo(this.id,this.value,'button-civilite')">
            </div>
        </div>
    </div>

    <button id="button-civilite" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
</form>

<!-- modification password -->
<form class="large_box" action="/user/updateUserPassword" method="POST">
    <span class="Black_police_65">Changer de mot de passe</span>
    <div class="input_password_space">
        <div class="inputText_space">
            <label class="Black_police_55" for="currentpasswords">Mot de passe actuel</label>
            <input class="sidebar" type="password" placeholder="**************" id="currentpasswords" name="currentpasswords" initval="" oninput="checkedUpdateChangePassword(this.id,this.value,'ChangePassword')" required>
        </div>
        <div class="inputText_space">
            <label class="Black_police_55" for="newpasswords">Nouveau mot de passe</label>
            <input class="sidebar" type="password" placeholder="**************" id="newpasswords" name="newpasswords" initval="" oninput="checkedUpdateChangePassword(this.id,this.value,'ChangePassword')" required>
        </div>
    </div>
    <button id="ChangePassword" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
</form>

<?php
    if (isset($_SESSION['popup'])) {
        echo '<script>showSuccessPopup("'.$_SESSION['popup']['title'].'","'.$_SESSION['popup']['message'].'");</script>';
        unset($_SESSION['popup']);
    }
?>


<script src="/frontend/scripts/clientSpace/pre_fill.js"></script>
<script src="/frontend/scripts/clientSpace/informations.js"></script>