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

$productID = $_POST['productID'];

$productID = mysqli_real_escape_string($conn, $productID);

$sql = "DELETE FROM products WHERE product_id='$productID'";
if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
} else {
    echo "Error deleting: " . mysqli_error($conn);
}

?>
