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
$orderID = $_POST['orderID'];

$userID = mysqli_real_escape_string($conn, $userID);
$orderID = mysqli_real_escape_string($conn, $orderID);

$sql = "DELETE FROM cart WHERE user_id='$userID' AND order_id='$orderID'";
if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
} else {
    echo "Error deleting: " . mysqli_error($conn);
}

?>
