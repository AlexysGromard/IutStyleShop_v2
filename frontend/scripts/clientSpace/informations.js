console.log("helo");


let civility;
for (element of document.getElementsByName("civility")){
    if (element.checked){
        civility = element.value;
        break;
    }
}

 
let last_name = document.getElementById("last-name").value;
let first_name = document.getElementById("first-name").value;
let mail = document.getElementById("mail").value;
let phone = document.getElementById("phone").value;


var personalInfo = new Map();
personalInfo.set("civility", civility);
personalInfo.set("last-name", last_name);
personalInfo.set("first-name", first_name);
personalInfo.set("mail", mail);
personalInfo.set("phone", phone);

var personalInfoModif = new Map();
personalInfoModif.set("civility", false);
personalInfoModif.set("last-name", false);
personalInfoModif.set("first-name", false);
personalInfoModif.set("mail", false);
personalInfoModif.set("phone", false);


///////////////////////////////////////////////

let currentpasswords = document.getElementById("currentpasswords").value;
let newpasswords = document.getElementById("newpasswords").value;


var changepassword = new Map()
changepassword.set("currentpasswords", currentpasswords);
changepassword.set("newpasswords", newpasswords);

var changepasswordModif = new Map()
changepasswordModif.set("currentpasswords", false);
changepasswordModif.set("newpasswords", false);

function checkedUpdatePersonalInfo(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = personalInfo.get(id);
    if (value != oldvalue){
        personalInfoModif.set(id,true)
    }else{
        personalInfoModif.set(id,false)
    }

    var thereismodif = false
    for (var valeur of personalInfoModif){
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


function checkedUpdateChangePassword(id,value,idbutton){


    var button = document.getElementById(idbutton);

    var oldvalue = changepassword.get(id);
    if (valeur[1] != oldvalue){
        changepasswordModif.set(id,true)
    }else{
        changepasswordModif.set(id,false)
    }

    var thereismodif = false
    for (var valeur of changepasswordModif){
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

console.log("fin");