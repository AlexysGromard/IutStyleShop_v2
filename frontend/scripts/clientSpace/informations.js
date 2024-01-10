
let civility
for (element of document.getElementsByName("civility")){
    console.log(element.checked)
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

function checkedUpdatePersonalInfo(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = personalInfo.get(id);
    if (value != oldvalue){
        button.classList.remove("disabled");
    }else{
        button.classList.add("disabled");
    }
}
///////////////////////////////////////////////

let currentpasswords = document.getElementById("currentpasswords").value;
let newpasswords = document.getElementById("newpasswords").value;


var changepassword = new Map()
personalInfo.set("currentpasswords", currentpasswords);
personalInfo.set("newpasswords", newpasswords);


function checkedUpdateChangePassword(id,value,idbutton){
    var button = document.getElementById(idbutton);

    var oldvalue = changepassword.get(id);
    if (value != oldvalue){
        button.classList.remove("disabled");
    }else{
        button.classList.add("disabled");
    }
}