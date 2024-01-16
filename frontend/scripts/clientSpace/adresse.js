////
let adresse = document.getElementById("address").value;
let code = document.getElementById("code").value;
let complement_adresse = document.getElementById("complement").value;
let ville = document.getElementById("city").value;


var myAdresse = new Map()
myAdresse.set("addresse", adresse);
myAdresse.set("code", code);
myAdresse.set("complement", complement_adresse);
myAdresse.set("city", ville);

myAdresseModif = new Map()
myAdresse.set("addresse", false);
myAdresse.set("code", false);
myAdresse.set("complement", false);
myAdresse.set("city", false);


function checkedUpdateAdresse(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = myAdresse.get(id);
    if (value != oldvalue){
        myAdresseModif.set(id,true)
    }else{
        myAdresseModif.set(id,false)
    }

    var thereismodif = false
    for (var valeur of myAdresseModif){
        if (valeur[1] == true){
            thereismodif = true
            break;
        }
    }

    if (thereismodif){
        button.classList.remove("disabled");
    }else{
        button.classList.add("disabled");
    }

}
/*
*  Fonction qui vérifie que le code postal ne contient que des chiffres et n'est pas supérieur à 5
*/
document.getElementById("code").addEventListener("input", function(e) {
    console.log(e.target.value)
    // Si taille supérieure à 5 et contient que des chiffres
    if (e.target.value.length > 5 || isNaN(e.target.value)){
        e.target.value = e.target.value.substring(0, e.target.value.length - 1)
    }
});