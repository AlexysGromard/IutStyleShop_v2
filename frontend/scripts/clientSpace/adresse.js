////
let adresse = document.getElementById("adresse").value;
let code = document.getElementById("code").value;
let complement_adresse = document.getElementById("complement_adresse").value;
let ville = document.getElementById("ville").value;


var myAdresse = new Map()
myAdresse.set("adresse", adresse);
myAdresse.set("code", code);
myAdresse.set("complement_adresse", complement_adresse);
myAdresse.set("ville", ville);

myAdresseModif = new Map()
myAdresse.set("adresse", false);
myAdresse.set("code", false);
myAdresse.set("complement_adresse", false);
myAdresse.set("ville", false);


function checkedUpdateAdresse(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = myAdresse.get(id);
    if (value != oldvalue){
        myAdresseModif.set(id,true)
    }else{
        myAdresseModif.set(id,true)
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