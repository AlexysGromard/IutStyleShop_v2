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


function checkedUpdateAdresse(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = myAdresse.get(id);
    if (value != oldvalue){
        button.classList.remove("disabled");
    }else{
        button.classList.add("disabled");
    }
}