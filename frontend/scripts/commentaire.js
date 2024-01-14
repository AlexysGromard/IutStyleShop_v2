
/*
    * Fonction qui permet de retourner en arrière
*/
function retournerEnArriere() {
    window.history.back();
  }



/*
    * Fonction qui compte le nombre de caractères restants
*/
function compterCaracteres() {

    var textarea = document.getElementById("commentaire");
    var nombreCaracteres = textarea.value.length;

    console.log("Nombre de caractères:", nombreCaracteres);

    if (nombreCaracteres > 500) {
        textarea.style.color = "red";
        textarea.value = textarea.value.substring(0, 500);
        nombreCaracteres = 500;
    }
    else {
        document.getElementById("commentaire").style.color = "black";
    }

    document.getElementById("nb-caractere").innerHTML = nombreCaracteres;
    }
  

/*
    * Fonction qui permet de mettre le nombre d'etoiles en fonction de la note
*/
function mettreEtoiles() {
    var note = document.getElementById("note").value;
    console.log("Note:", note);
    var etoiles = "";
    for (var i = 0; i < note; i++) {
        etoiles += "<img src='images/etoile.png' alt='etoile' class='etoile'>";
    }
    document.getElementById("etoiles").innerHTML = etoiles;
}


