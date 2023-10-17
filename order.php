<!DOCTYPE html>
<html lang="en">
<head>
<title>Pasta!</title>
<meta charset="utf-8">
<style>
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

#order_button{
    background-color: rgba(0, 0, 0, 0.7); /* Translucent black background */
    color: white;
    padding: 10px 20px; 
    display: inline-block;
    border-radius: 10px;
    border: none;
    font-size: 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    position: fixed;
    bottom: 20%; /* Adjust this value to control vertical positioning */
    left: 50%;
    transform: translateX(-50%); /* Center the button horizontally */
}
#wrapper{
    margin: 35px 20px 20px 20px;
    width: 90%;
    height: 500px;
    padding: 20px;
    border: 2px solid #333;
    border-radius: 10px;
    border-color: black;
}

select{
    display: block; /* makes the dropdown list stack ontop of each other */
    width: 40%;
    margin: 20px 0 10px 5px;
    padding: 16px 20px;
    border: none;
    border-radius: 10px;
    background-color: #f1f1f1;
}

</style> 

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benners_pasta";

@ $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

?>

</head>

<body>
  <header>
  <nav>
    <ul class='navbar'>
      <li><a href="index.html">Home</a></li>
      <li><a href="order.php">Order Now</a></li>
      <li><a href="">Track Order</a></li>
      <li><a href="">Checkout</a></li>
	</ul>
  </nav>
  </header>

  <div id="wrapper">
    <label for="pasta_drop"></label>
    <select style="margin-top: 0px;" id="pasta_drop" name="pasta_drop">
    <option value="" disabled selected>Choose type of pasta</option>
        <?php
        $sql = "select * from pasta";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["pasta_name"] . "'>" . $row["pasta_name"] . "</option>";
            }
        }
        else {
            echo "No results found.";
        }
        ?>

    </select>

    <label for="base_drop"></label>
    <select id="base_drop" name="base_drop">
        <option value="" disabled selected>Choose base</option>
        <?php
        $sql = "select * from base";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["base_name"] . "'>" . $row["base_name"] . "</option>";
            }
        }
        else {
            echo "No results found.";
        }
        ?>
    </select>

    <label for="meat_drop"></label>
    <select id="meat_drop" name="meat_drop">
        <option value="" disabled selected>Choose meat</option>
        <?php
        $sql = "select * from meat";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["meat_name"] . "'>" . $row["meat_name"] . "</option>";
            }
        }
        else {
            echo "No results found.";
        }
        ?>

    </select>

    <label for="veg_drop"></label>
    <select id="veg_drop" name="veg_drop">
        <option value="" disabled selected>Choose vegetables</option>
        <?php
        $sql = "select * from vegetables";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["veg_name"] . "'>" . $row["veg_name"] . "</option>";
            }
        }
        else {
            echo "No results found.";
        }
        ?>
    </select>



  </div>

</body>


<footer style="padding:20px">
</footer>

</html>


