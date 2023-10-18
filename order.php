<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pasta!</title>
    <meta charset="utf-8">
    <style>
        a {
            text-decoration: none;
            color: white;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.7);
            /* Translucent black background */
            overflow: hidden;
        }

        ul.navbar {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
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

        #button_container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #button_container #buttons {
            background-color: rgba(0, 0, 0, 0.7);
            /* Translucent black background */
            display: block;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            width: 160px;
            /* Set the desired width */
            height: 50px;
            /* Set the desired height */
            font-size: 17px;
            border: none;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

        #wrapper {
            margin: 35px 20px 20px 20px;
            min-width: 90%;
            height: 500px;
            padding: 10px;
            border: 2px solid #333;
            border-radius: 10px;
            border-color: black;
            position: relative;
        }

        #menu_label {
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

        #left_column {
            float: left;
            padding: 45px 0 0 18px;
            width: 49%;
            border: none;
            border-radius: 10px;
            border-color: black;
        }

        select {
            display: block;
            /* makes the dropdown list stack ontop of each other */
            width: 90%;
            margin: 20px 0 10px 5px;
            padding: 16px 20px;
            border: none;
            border-radius: 10px;
            background-color: #f1f1f1;
        }

        #subtotal {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        #price_label {
            position: absolute;
            font-size: 20px;
            background-color: white;
            margin-left: 18px;
            z-index: 1;
            font-weight: bold;
            padding-left: 5px;
            padding-right: 5px;
        }

        #price {
            position: absolute;
            font-size: 20px;
            width: 30px;
            background-color: white;
            border: solid 1px #333;
            padding: 24px;
            padding-right: 88px;
            margin-top: 30px;
            z-index: 0;
            border-radius: 10px;
            font-weight: bold;
        }


        #right_column {
            display: flex;
            flex-direction: column;
            padding: 45px 0 0 0;
            float: right;
            width: 40%;

            border: none;
            border-radius: 10px;
            border-color: black;
            margin-right: 60px;
        }

        #spe_req_tb {
            display: block;
            margin: 0 0 10px;
            padding: 9px;
            border: solid 1px #333;
            border-radius: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "benners_pasta";

    @$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    ?>
    <script src="update_price.js"></script>

</head>

<body>
    <header>
        <nav>
            <ul class='navbar'>
                <li><a href="index.html">Home</a></li>
                <li><a href="order.php">Order Now</a></li>
                <li><a href="track.html">Track Order</a></li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </nav>
    </header>

    <form method="POST" action="checkout.php">

        <div id="wrapper">
            <p id="menu_label">Menu</p>
            <div id="left_column">
                <label for="pasta_drop"></label>
                <select style="margin-top: 0px;" id="pasta_drop" name="pasta_drop" onchange="updatePriceLabel()">
                    <option value=0 disabled selected>Choose type of pasta</option>
                    <?php
                    $sql = "select * from pasta";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["pasta_price"] . "'>" . $row["pasta_name"] . " - $" . $row["pasta_price"] . "</option>";
                        }
                    } else {
                        echo "No results found.";
                    }
                    ?>

                </select>

                <label for="base_drop"></label>
                <select id="base_drop" name="base_drop" onchange="updatePriceLabel()">
                    <option value=0 disabled selected>Choose base</option>
                    <?php
                    $sql = "select * from base";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["base_price"] . "'>" . $row["base_name"] . " - $" . $row["base_price"] . "</option>";
                        }
                    } else {
                        echo "No results found.";
                    }
                    ?>
                </select>

                <label for="meat_drop"></label>
                <select id="meat_drop" name="meat_drop" onchange="updatePriceLabel()">
                    <option value=0 disabled selected>Choose meat</option>
                    <?php
                    $sql = "select * from meat";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["meat_price"] . "'>" . $row["meat_name"] . " - $" . $row["meat_price"] . "</option>";
                        }
                    } else {
                        echo "No results found.";
                    }
                    ?>

                </select>

                <label for="veg_drop"></label>
                <select id="veg_drop" name="veg_drop" onchange="updatePriceLabel()">
                    <option value=0 disabled selected>Choose vegetables</option>
                    <?php
                    $sql = "select * from vegetables";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["veg_price"] . "'>" . $row["veg_name"] . " - $" . $row["veg_price"] . "</option>";
                        }
                    } else {
                        echo "No results found.";
                    }
                    ?>
                </select>

                <br>

                <div id="subtotal">
                    <p id="price_label">Subtotal</p>
                    <p id="price">$0.00</p>
                </div>

            </div>

            <div id="right_column">
                <textarea id="spe_req_tb" rows=14 cols=78 type="text" placeholder="Special Requirements"></textarea>
                <br>
                <div id="button_container">
                    <button id="buttons" type="button">Add to Cart</button><br>
                    <input type="submit" id="buttons" name="submit" value="Go To Checkout">
                </div>




            </div>


        </div>

    </form>

</body>


<footer style="padding:20px">
</footer>

</html>