function updatePriceLabel() {
    'use strict';
    var pasta_price = document.getElementById('pasta_drop').value;
    var base_price = document.getElementById('base_drop').value;
    var meat_price = document.getElementById('meat_drop').value;
    var veg_price = document.getElementById('veg_drop').value;

    document.getElementById('price').innerText = "$" + String(parseFloat(pasta_price) + parseFloat(base_price) + 
                                                parseFloat(meat_price) + parseFloat(veg_price));
}