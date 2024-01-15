
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

    /*console.log("Nombre de caractères:", nombreCaracteres);*/

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
    var note = document.querySelector('input[name="note"]:checked').value;
    console.log("Note:", note);

    for (var i = 0; i < note; i++) {
        var imageId = "etoile" + i;
        document.getElementById(imageId).src = "/frontend/assets/icons/marquer-comme-star-preferee.svg";
    }

    // Réinitialise les images non sélectionnées
    for (var j = parseInt(note) ; j < 5; j++) {
        imageId = "etoile" + j;
        document.getElementById(imageId).src = "/frontend/assets/icons/marquer-comme-star-pas-preferee.svg";
    }

    
}


