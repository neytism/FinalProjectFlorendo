<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userID = $_SESSION["user_id"];
$itemID = $_POST['itemID'];
$quantity = 1;

$userID = mysqli_real_escape_string($conn, $userID);
$itemID = mysqli_real_escape_string($conn, $itemID);

$sql = "SELECT * FROM cart WHERE product_id='$itemID' AND user_id='$userID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE cart SET quantity=quantity+'$quantity' WHERE product_id='$itemID' AND user_id='$userID'";
} else {
    $sql = "INSERT INTO cart(product_id,quantity,user_id) VALUES('$itemID','$quantity','$userID')";
}

mysqli_query($conn, $sql);
echo "success";
?>
