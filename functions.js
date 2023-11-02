function updatePriceLabel() {
    'use strict';
    var pasta_price = document.getElementById('pasta_drop').value;
    var base_price = document.getElementById('base_drop').value;
    var meat_price = document.getElementById('meat_drop').value;
    var veg_price = document.getElementById('veg_drop').value;

    document.getElementById('price').innerText = "$" + String(parseFloat(pasta_price) + parseFloat(base_price) + 
                                                parseFloat(meat_price) + parseFloat(veg_price));
}

function clearCart(){
        fetch("clear_cart.php", {
          method: "POST", // You can use POST or GET depending on your needs
        })
          .then(function (response) {
            if (response.status === 200) {
              // Handle the success, e.g., provide a confirmation message
              console.log("Array cleared successfully.");
            } else {
              // Handle errors, e.g., display an error message
              console.error("Failed to clear the array.");
            }
          })
          .catch(function (error) {
            console.error("Error:", error);
          });
    };
