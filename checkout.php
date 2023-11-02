<?php

$pasta = $_POST['pasta_drop'];
$meat = $_POST['meat_drop'];
$veg = $_POST['veg_drop'];
$base = $_POST['base_drop'];

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
    margin: 10px 0 0 20px;
    border: solid 1px #333;
    border-radius: 10px;
    background-color: #f1f1f1;
    font-size: 16px;
    padding-left: 6px;
    width: 100%; 
    height: 30px; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.secret_details_tb{
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
    margin: 10px 0 0 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

#items_summary ul li{
    font-size: 30px;
    padding: 20px 0 0 0;
    
}

table input:valid {
    background-color: palegreen;
}

table input:invalid {
    background-color: lightpink;
}

table {
    margin-top: 20px;
    margin-left: 15px;
    width: 85%;
}

td:has(label) {
    width: 25%;
}

.submit{
    background-color: rgba(0, 0, 0, 0.7); 
    color: white;
    padding: 10px 20px; 
    display: inline-block;
    border-radius: 10px;
    border: none;
    font-size: 15px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    bottom: 10%; /* adjust to control button y-positioning */
    left: 50%;
}

</style> 

</head>

<?php 
    session_start();
    echo $_SESSION["user_email"]; ?>

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
    <br>
<form>
    <table>
    <tr>
    <td><label for="name">Name: </label></td>
    <td><input id="name" type="text" class="details_tb" maxlength="32" pattern="[A-Za-z ]{1,32}" required></td>
    </tr>

    <tr>
    <td><label for="card">Card Number: </label></td>
    <td><input id="card" type="text" minlength ="16" maxlength="16" class="details_tb" inputmode="numeric" pattern="[0-9\s]{13,16}" placeholder="xxxx xxxx xxxx xxxx" required></td>
    </tr>

    <tr>
    <td><label for="cardexp">Card Expiry: </label></td>
    <td><input style="width: 50%;" id="cardexp" min="" type="month" class="secret_details_tb" style="" placeholder="MM/YY" required></td>
    </tr>

    <tr>
    <td><label for="cvv">CVV: </label></td>
    <td><input id="cvv" type="password" maxlength="3" pattern="[0-9\s]{3}" class="secret_details_tb" style placeholder="xxx" required></td>
    </tr>

    <tr>
    <td><label for="email">Email: </label></td>
    <td><input id="email" type="email" class="details_tb" placeholder="Email" required></td>
    </tr>
</table>
<div style="text-align: center; margin-top: 60px;">
<input class="submit" type="submit" value="Submit">
</div>
</form>
</div>

    <div id="right_column">
    <p id="order_summary_label">Order Summary</p>

    <div id="items_summary">
        <ul>
            <li><?php echo $pasta?></li>
            <li><?php echo $base?></li>
            <li><?php echo $meat?></li>
            <li><?php echo $veg?></li>
        </ul>
    </div>



    </div>


  </div>

</body>


<footer style="padding:20px">
</footer>

</html>


