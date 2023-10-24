<!DOCTYPE html>
<html lang="en">
<head>
<title>Pasta!</title>
<meta charset="utf-8">
<style>
nav {
    background-color: rgba(0, 0, 0, 0.7); /* translucent black background */
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

#order_button{
    background-color: rgba(0, 0, 0, 0.7); 
    color: white;
    padding: 10px 20px; 
    display: inline-block;
    border-radius: 10px;
    border: none;
    font-size: 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    position: fixed;
    bottom: 20%; /* adjust to control button y-positioning */
    left: 50%;
    transform: translateX(-50%); /* center the button x-pos */
}

#email{
    position: fixed;
    bottom: 30%; /* adjust to control button y-positioning */
    left: 50%;
    transform: translateX(-50%); /* center the button x-pos */
    width: 300px;
    height: 50px;
    font-size: 20px;
    border-radius: 10px;
    border: 2px solid black;
    padding: 10px 20px; 
    display: inline-block;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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
      <li><a href="checkout.html">Checkout</a></li>
	</ul>
  </nav>
  </header>
    <?php 
    
    ?>
  <h1 style="text-align: center; font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
    Fresh Pasta Made Daily!!!!!!!!!!!1</h1>
<form id="order_form" action="order.php" method="post">
    <!--start session state here-->
    <input type="email" id="email" name="email" placeholder="Enter your email..">

    <input id='order_button' type="submit" name="order" value="Order Now">
</form>

</body>


<footer style="padding:20px">
</footer>

</html>


