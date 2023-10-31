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

#buttons{
    background-color: rgba(0, 0, 0, 0.7); /* Translucent black background */
    display: block;
    color: white;
    padding: 10px 10px; 
    margin-left: 20px; 
    border-radius: 10px;
    width: 100px; /* Set the desired width */
    height: 50px; /* Set the desired height */
    font-size: 17px;
    border: none;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

#wrapper{
    width: 25%;
    height: 450px;
    margin: 0 auto;
    margin-top: 35px;
    padding: 10px;
    border: 2px solid #333;
    border-radius: 10px;
    border-color: black;
    position: relative;
}

#wrapper_label{
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

.content{
    margin-top: 50px;
    text-align: center;
    padding: 10px 20px 0 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}

</style> 

</head>

<body>

<?php
date_default_timezone_set('Asia/Singapore');

$email = $_POST["email"];

// Establish a connection to your local database (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benners_pasta";

// Create connection
@ $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Query to fetch data from the database (replace with your own query)
$sql_1 = "select timestamp from orders where email = '$email'";
$sql_2 = "select order_id from orders where email = '$email'";
$result_timestamp = $conn->query($sql_1)->fetch_all();
$result_order_id = $conn->query($sql_2)->fetch_all();

if (count($result_order_id) == 0) {
    echo '<script> alert("Email does not exist. Please enter a valid email"); 
    window.location.href="track.html"; </script>';
    exit();
}

$order_timestamp = end($result_timestamp);
$order_timestamp = $order_timestamp[0];
$order_timestamp = new DateTime($order_timestamp);

$order_id = end($result_order_id);
$order_id = $order_id[0];

$current_timestamp = new DateTime("now");

$time_diff = $order_timestamp->diff($current_timestamp); 
$time_check = $time_diff->format('%H');

$time_elapsed = $time_diff->format('%i minutes');

if (floatval($time_check) > 0) {
    $order_id = "Queue number has expired!"; 
    $time_elapsed = "Time elapsed: > 1 hour";
}

else {
    $order_id = "Queue Number: $order_id"; 
    $time_elapsed = "Time elapsed: $time_elapsed";
}


?>

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

  <form>
<div id="wrapper">
  <p id="wrapper_label">Thank You!</p>

  <div class="content">
    <h1>Queue Ticket</h1>
    <br>
    <h2 style="font-size: 30px;">
        <?php echo $order_id ?><br><br>
        <?php echo $time_elapsed ?> <br><br>

    </h2>
  </div>

</div>
</form>

</body>


<footer style="padding:20px">
</footer>

</html>


