function unroll_items(numProduct){
    var checkBox = document.getElementById("checkbox_product_"+numProduct);

    var boxProduct = document.getElementById("box_product_"+numProduct);

    if (checkBox.checked == true){
        boxProduct.overflow = false;
        boxProduct.style.maxHeight = "100%";
        
    }else{
        boxProduct.style.maxHeight = "0px";
    }
}