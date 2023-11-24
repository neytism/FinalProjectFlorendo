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

// Get the imagePath before deleting the record
$sql = "SELECT imagePath FROM products WHERE product_id='$productID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$imagePath = '../'.$row['imagePath'];

// Delete the record from the database
$sql = "DELETE FROM products WHERE product_id='$productID'";
if (mysqli_query($conn, $sql)) {
    // Delete the image file
    if (unlink($imagePath)) {
        echo "Image deleted successfully";
    } else {
        echo "Error deleting image";
    }
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
