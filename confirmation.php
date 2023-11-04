<?php
session_start();

$email = $_POST['email'];
$_SESSION['email'] = $email;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benners_pasta";

@$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($_SESSION['cart'] as $item) {
    $pasta = $item[0];
    $base = $item[1];
    $meat = $item[2];
    $veg = $item[3];
    $spe_req = $item[4];
    $order_total = $item[5];

    try {
        $sql = "INSERT INTO orders (pasta, base, meat, veg, spe_req, order_total, email) VALUES ('$pasta', '$base', '$meat', '$veg', '$spe_req', '$order_total', '$email')";
        $conn->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
}


$to = "isaactaypb@gmail.com";
$subject = "Do you have any pasta for me?";
$message = 's';
$headers = "From: your-email@example.com";
unset($_SESSION['cart']);

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send the email.";
}

header("Refresh:3; url=queue.php")


?>