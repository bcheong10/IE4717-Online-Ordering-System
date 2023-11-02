<?php 
session_start();
unset($_SESSION['cart']);
header("Refresh:0; url=checkout.php");
?>