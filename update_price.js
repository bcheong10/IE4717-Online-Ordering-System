function updatePriceLabel() {
    'use strict';
    var pasta_string = document.getElementById('pasta_drop').value;
    var base_string = document.getElementById('base_drop').value;
    var meat_string = document.getElementById('meat_drop').value;
    var veg_string = document.getElementById('veg_drop').value;

    var pasta_price = pasta_string.split(",")[1];
    var base_price = base_string.split(",")[1];
    var meat_price = meat_string.split(",")[1];
    var veg_price = veg_string.split(",")[1];


    document.getElementById('price').innerText = "$" + String(parseFloat(pasta_price) + parseFloat(base_price) + 
                                                parseFloat(meat_price) + parseFloat(veg_price));
}