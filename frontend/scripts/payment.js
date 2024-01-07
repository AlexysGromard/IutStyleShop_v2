


function unroll_items(numPayment){
    var radiobutton = document.getElementById("panel-"+numPayment);

    var boxPaymentSelect = document.getElementById("box-payment-"+numPayment);

    var listbox = [];
    var numbox = 1;
    var newbox = document.getElementById("box-payment-"+numbox);
    while (newbox != null) {
        if (numbox != numPayment){
            listbox.push(newbox);
        }
        
        numbox++;
        newbox = document.getElementById("box-payment-"+numbox);
    }


    if (radiobutton.checked == true){

        for (var box in listbox){
            listbox[box].style.maxHeight = "0px";
            listbox[box].style.marginTop = "0px";
            listbox[box].style.transition = "max-height 0.4s";
        }

        boxPaymentSelect.style.maxHeight = "100%";
        boxPaymentSelect.style.marginTop = "20px";
        boxPaymentSelect.style.transition = "0.4s max-height 0.1s";

    }
}