document.getElementById("Qnone").addEventListener('change', Qnone);
const quantity = document.getElementById("quantity");

$("#kg").change(() => {
    if(quantity.disabled)
    {
        $(quantity).show();
        quantity.disabled = false;
    }
});

$("#g").change(() => {
    if(quantity.disabled)
    {
        $(quantity).show();
        quantity.disabled = false;
    }
});

$("#mg").change(() => {
    if(quantity.disabled)
    {
        $(quantity).show();
        quantity.disabled = false;
    }
});


function Qnone(event) {
    quantity.disabled = true;
    $(quantity).hide();
}
