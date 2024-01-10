
for (element of document.getElementsByClassName("sidebar")){
    var val = element.getAttribute("initval");
    if (val != null){
        element.value = val;
    }
}



///end start



let civility

for (element of document.getElementsByName("civility")){
    console.log(element.checked)
    if (element.checked){
        civility = element.value
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

    console.log(id);
    console.log(value);
    console.log(idbutton);

    var oldvalue = personalInfo.get(id);
    if (value != oldvalue){
        button.classList.remove("disabled");
    }else{
        button.classList.add("disabled");
    }
}



function unroll_items(numProduct){
    var checkBox = document.getElementById("checkbox_product_"+numProduct);

    var boxProduct = document.getElementById("box_product_"+numProduct);

    if (checkBox.checked == true){
        boxProduct.style.maxHeight = "100%";
        
    }else{
        boxProduct.style.maxHeight = "0px";
    }
}