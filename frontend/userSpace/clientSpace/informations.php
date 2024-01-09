<!-- information personnel -->
<form class="large_box" action="xx">
                        
    <span class="Black_police_65">Informations personnelles</span>
    <div class="civility_choice_space">
        <span class="Black_police_55" >Civilité</span>
        <div>
            <label for="civility-woman" class="radio_button_space">
                <?php
                    $input = '<input class="radioButton" type="radio" value="Femme" id="civility-woman" name="civility" ';
                    if ($personne->genre=='F' ) {
                        $input.= 'checked ';
                    }
                    $input.= '/> ';
                    echo $input;

                    ?>
                <span class="Black_police_40" >Femme</span>
            </label>
            <label for="civility-man" class="radio_button_space">
                <?php
                $input = '<input class="radioButton" type="radio" value="Homme" id="civility-man" name="civility" ';
                if ($personne->genre=='M' ) {
                    $input.= 'checked ';
                }
                $input.= '/> ';
                echo $input;

                ?>
                <span class="Black_police_40"  >Homme</span>
            </label>
            <label for="civility-none" class="radio_button_space">
                <?php
                    $input = '<input class="radioButton" type="radio" value="Ne souhaite pas se prononcer" id="civility-none" name="civility" ';
                    if ($personne->genre!='M' && $personne->genre!='F' ) {
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
                <input class="sidebar" type="text" placeholder="Votre nom" id="last-name" name="Nom" value=<?= $personne->nom; ?>>
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="first-name">Prénom</label>
                <input class="sidebar" type="text" placeholder="Prénom" id="first-name" name="Prenom" value=<?= $personne->prenom; ?>>
            </div>
        </div>
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="mail">Adresse mail</label>
                <input class="sidebar" type="mail" placeholder="Votre adresse mail" id="mail" name="mail" value=<?= $personne->mail; ?>>
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="phone">Numéro de téléphone</label>
                <input class="sidebar" type="phone" placeholder="06 00 00 00 00" id="phone" name="tel" >
            </div>
        </div>
    </div>

    <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>
</form>

<!-- modification password -->
<form class="large_box" action="xx">
    <span class="Black_police_65">Changer de mot de passe</span>
    <div class="input_password_space">
        <div class="inputText_space">
            <label class="Black_police_55" for="currentpasswords">Mot de passe actuel</label>
            <input class="sidebar" type="password" placeholder="**************" id="currentpasswords" name="currentpasswords" minlength="8" required>
        </div>
        <div class="inputText_space">
            <label class="Black_police_55" for="newpasswords">Nouveau mot de passe</label>
            <input class="sidebar" type="password" placeholder="**************" id="newpasswords" name="newpasswords" minlength="8" required>
        </div>
    </div>
    <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>

</form>