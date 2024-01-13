

function reload_pageName(){
    console.log("Oui")

    tshirt = false;
    sweatshirt= false;
    sportswear=false;
    accessories = false;
    if(document.getElementById('product-type')){
        tshirt = document.getElementById('tshirt').checked;
        sweatshirt = document.getElementById('sweatshirt').checked;
        sportswear = document.getElementById('sportswear').checked;
        accessories = document.getElementById('accessories').checked;  
    }
    // Récupérer les couleurs (type checkbox)
    red = document.getElementById('red').checked;
    green = document.getElementById('green').checked;
    blue = document.getElementById('blue').checked;
    white = document.getElementById('white').checked;
    black = document.getElementById('black').checked;

    //Les prix 
    prixMin = document.getElementById('fromSlider').value;
    prixMax = document.getElementById('toSlider').value;

    link = "/products/filter/"+tshirt.toString()+"/" + sweatshirt.toString()+"/" +sportswear.toString()+"/"+ accessories.toString() + "/"+red+"/"+green+"/"+blue+"/"+white+"/"+black+"/"+prixMin+"/"+prixMax;
    console.log(link)
    
    document.location.href = link

}


validate_button = document.getElementById('button-validate');
validate_button.addEventListener("click", reload_pageName);
