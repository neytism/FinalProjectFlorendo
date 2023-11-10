<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "onlinestore";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Connection error: ' . mysqli_connect_error());
}



$order_id = $_POST['order_id'];
$userID = $_SESSION['user_id'];
$value = $_POST['value'];

$sql = "UPDATE cart SET quantity ='$value' WHERE user_id='$userID' AND order_id='$order_id'";

if (!mysqli_query($conn, $sql)) {
    echo("Error description: " . mysqli_error($conn));
}

?>
