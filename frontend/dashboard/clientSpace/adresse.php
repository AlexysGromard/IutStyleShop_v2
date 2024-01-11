<form class="large_box" action="xx">
    <!-- infomation sur l'adresse phisique -->
    <span class="Black_police_65">Mon adresse</span>

    <div class="square_of_2">
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="adresse">Adresse</label>
                <input class="sidebar" type="text" placeholder="1 Rue du marechal joffre" id="adresse" name="adresse" initval="<?= $personne->getAdresse(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonadress')">
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="code">Code postal</label>
                <input class="sidebar" type="text" placeholder="44000" id="code" name="code" initval="<?= $personne->getCodePostal(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonadress')">
            </div>
        </div>
        <div>
            <div class="inputText_space">
                <label class="Black_police_55" for="complement_adresse">Complément d'adresse</label>
                <input class="sidebar" type="text" placeholder="Appartement B15" id="complement_adresse" name="complement_adresse" initval="<?= $personne->getComplementAdresse(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonadress')">
            </div>
            <div class="inputText_space">
                <label class="Black_police_55" for="ville">Ville</label>
                <input class="sidebar" type="text" placeholder="Nantes" id="ville" name="ville" initval="<?= $personne->getVille(); ?>" oninput="checkedUpdateAdresse(this.id,this.value,'buttonadress')">
            </div>
        </div>
    </div>

    <button id="buttonadress" type="submit" class="small-size button White_police_40 button_check disabled" >Valider</button>
    
</form>

<script src="/frontend/scripts/pre_fill.js"></script>
<script src="/frontend/scripts/clientSpace/adresse.js"></script>