function unroll_items(numProduct){
    var checkBox = document.getElementById("checkbox_product_"+numProduct);

    var boxProduct = document.getElementsByClassName("box_product_"+numProduct);
    console.log(boxProduct);
    
    for(var box of boxProduct){

        if (checkBox.checked == true){
            box.style.maxHeight = "100%";
            console.log(numProduct)
            
        }else{
            box.style.maxHeight = "0px";
        }
    }


}