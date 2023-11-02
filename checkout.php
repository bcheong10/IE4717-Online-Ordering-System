<?php
session_start();

$cart = $_SESSION['cart'];
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<script src='functions.js'></script>

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
            margin-top: 45px;
            margin-left: 350px;
        }

        #button_container #buttons {
            background-color: rgba(0, 0, 0, 0.7);
            margin-top: 5px;
            margin-left: 50px;
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
            border: none;
            border-radius: 10px;
            border-color: black;
            position: relative;
            display: flex;
            flex-direction: row;
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

        #customer_info_label {
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

        #order_summary_label {
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
            display: flex;
            flex-direction: column;
            width: 48%;
            border: solid 2px #333;
            border-radius: 10px;
            border-color: black;

            position: relative;
        }

        #right_column {
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

        .details_tb {
            margin: 10px 0 0 20px;
            border: solid 1px #333;
            border-radius: 10px;
            background-color: #f1f1f1;
            font-size: 16px;
            padding-left: 6px;
            width: 100%;
            height: 30px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .secret_details_tb {
            margin: 10px 0 0 20px;
            border: solid 1px #333;
            border-radius: 10px;
            background-color: #f1f1f1;
            font-size: 16px;
            padding-left: 6px;
            width: 30%;
            height: 30px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        #items_summary {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }


        #order_details {
            font-size: 1.1rem;

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

        .submit {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 10px;
            border: none;
            font-size: 15px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            bottom: 10%;
            /* adjust to control button y-positioning */
            left: 50%;
        }

        #subtotal {
            display: flex;
            flex-direction: column;
            position: relative;
            margin-left: 50px;
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
            <br>
            <form>
                <table>
                    <tr>
                        <td><label for="name">Name: </label></td>
                        <td><input id="name" type="text" class="details_tb" maxlength="32" pattern="[A-Za-z ]{1,32}" required></td>
                    </tr>

                    <tr>
                        <td><label for="card">Card Number: </label></td>
                        <td><input id="card" type="text" minlength="16" maxlength="16" class="details_tb" inputmode="numeric" pattern="[0-9\s]{13,16}" placeholder="xxxx xxxx xxxx xxxx" required></td>
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
                    
                    <div id="subtotal">
                        <p id="price_label">Subtotal</p>
                        <p id="price">$0.00</p>
                    </div>
                    <div id="button_container">
                        <button id="buttons" type="button"><a href='clear_cart.php'>Clear Cart</a></button><br>
                </div>
                </div>
            </form>
        </div>

        <div id="right_column">
            <p id="order_summary_label">Order Summary</p>

            <div id="items_summary">
                <ul>
                    <?php
                    if (count($cart) > 0) {
                        for ($i = 0; $i < count($cart); $i++) {
                            echo "<li style='font-size: 25px; margin-bottom: 15px;'> Order " . ($i + 1) . ": $" . $cart[$i][5] . "<ul id='order_details'>"
                                . "<li>" . $cart[$i][0] . "</li>" .
                                "<li>" . $cart[$i][1] . "</li>" .
                                "<li>" . $cart[$i][2] . "</li>" .
                                "<li>" . $cart[$i][3] . "</li>" .
                                "</ul>" .
                                "</li>";
                        }
                    } else {
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