<form class="large_box" action="xx">
    <!-- infomation sur l'adresse phisique -->
    <span class="Black_police_65">Mon adresse</span>

    <div class="square_of_2">
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="adresse">Adresse</label>
                <input class="sidebar" type="text" placeholder="1 Rue du marechal joffre" id="adresse" name="adresse" value=<?= $personne->adresse; ?>>
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="code">Code postal</label>
                <input class="sidebar" type="text" placeholder="44000" id="code" name="code" value=<?= $personne->code_postal; ?>>
            </div>
        </div>
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="complement_adresse">Complément d'adresse</label>
                <input class="sidebar" type="text" placeholder="Appartement B15" id="complement_adresse" name="complement_adresse" value=<?= $personne->complement_adresse; ?>>
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="ville">Ville</label>
                <input class="sidebar" type="text" placeholder="Nantes" id="ville" name="ville" value=<?= $personne->ville; ?>>
            </div>
        </div>
    </div>

    <button type="submit" class="small-size button White_police_40 button_check" >Valider</button>

</form>