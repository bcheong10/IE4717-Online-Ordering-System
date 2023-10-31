<?php
session_start();

$cart = $_SESSION['cart'];
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Pasta!</title>
<meta charset="utf-8">
<style>
a{
    text-decoration: none;
    color: white;
}
nav {
    background-color: rgba(0, 0, 0, 0.7); /* Translucent black background */
    overflow: hidden;
}

ul.navbar {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: center;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}

ul.navbar li {
    display: inline;
    padding: 0px 30px 0px 30px;
}

ul.navbar li a {
    text-decoration: none;
    color: white;
    padding: 10px 20px; 
    display: inline-block;
}

ul.navbar li a:hover {
    background-color: rgba(255, 255, 255, 0.2); 
    color: black;
}
#button_container{
    display: flex;
    flex-direction: column;
    align-items: center;
}

#button_container #buttons{
    background-color: rgba(0, 0, 0, 0.7); /* Translucent black background */
    display: block;
    color: white;
    padding: 10px 20px; 
    border-radius: 10px;
    width: 160px; /* Set the desired width */
    height: 50px; /* Set the desired height */
    font-size: 17px;
    border: none;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}

#wrapper{
    margin: 35px 20px 20px 20px;
    min-width: 90%;
    height: 500px;
    border: none;
    border-radius: 10px;
    border-color: black;
    position: relative;
    display: flex;
    flex-direction: row;
}

#menu_label{
    position: absolute;
    font-size: 25px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: white;
    margin-left: 18px; 
    z-index: 1;
    font-weight: bold;
    top: -42px;
}

#customer_info_label{
    position: absolute;
    font-size: 25px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: white;
    margin-left: 18px; 
    z-index: 1;
    font-weight: bold;
    top: -42px;
}

#order_summary_label{
    position: absolute;
    font-size: 25px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: white;
    margin-left: 18px; 
    z-index: 1;
    font-weight: bold;
    top: -42px;
}

#left_column{
    float: left;
    display: flex;
    flex-direction: column;
    width: 48%;
    border: solid 2px #333;
    border-radius: 10px;
    border-color: black;

    position: relative;
}

#right_column{
    float: right;
    display: flex;
    flex-direction: column;
    margin-left: 45px;
    width: 48%;
    border: solid 2px #333;
    border-radius: 10px;
    border-color: black;
    
    position: relative;
}

.details_tb{
    display: block;
    margin: 10px 0 0 20px;
    border: solid 1px #333;
    border-radius: 10px;
    background-color: #f1f1f1;
    font-size: 16px;
    padding-left: 6px;
    width: 80%; 
    height: 30px; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.secret_details_tb{
    display: block;
    margin: 10px 0 0 20px;
    border: solid 1px #333;
    border-radius: 10px;
    background-color: #f1f1f1;
    font-size: 16px;
    padding-left: 6px;
    width: 30%; 
    height: 30px; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

#items_summary{
    display: flex; 
    flex-direction: column;
    margin-top: 10px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}


#order_details{
    font-size: 1.1rem;
    
}

</style> 

</head>

<body>
  <header>
  <nav>
    <ul class='navbar'>
      <li><a href="index.php">Home</a></li>
      <li><a href="order.php">Order Now</a></li>
      <li><a href="track.html">Track Order</a></li>
      <li><a href="checkout.php">Checkout</a></li>
	</ul>
  </nav>
  </header>

  <div id="wrapper">
    <div id="left_column">
    <p id="customer_info_label">Customer Info</p>

    <input type="text" class="details_tb" style="margin-top: 29px" placeholder="Cardholder's Name">
    <input type="text" class="details_tb" placeholder="Card Number">

    <input type="month" class="secret_details_tb" style="width: 30%; margin-top: 29px" placeholder="MM/YY"> 
    <!--maybe use regex?-->
    <input type="text" class="secret_details_tb" style="width: 30%; margin-top: 29px" placeholder="CVV">

    </div>

    <div id="right_column">
    <p id="order_summary_label">Order Summary</p>

    <div id="items_summary">
        <ul>
            <?php 
                if(count($cart) > 0){
                    for ($i = 0; $i < count($cart); $i++) {
                        echo "<li style='font-size: 25px; margin-bottom: 15px;'> Order ".($i+1).": $".$cart[$i][5]."<ul id='order_details'>"
                        ."<li>".$cart[$i][0] ."</li>".
                        "<li>".$cart[$i][1]."</li>".
                        "<li>".$cart[$i][2]."</li>".
                        "<li>".$cart[$i][3]."</li>".
                        "</ul>".
                        "</li>";  
                    }
                }else{
                    echo "Nothing in cart!";
                }
            ?>
        </ul>
    </div>



    </div>


  </div>

</body>


<footer style="padding:20px">
</footer>

</html>


