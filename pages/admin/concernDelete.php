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

$inquiryID = $_POST['inquiryID'];

$inquiryID = mysqli_real_escape_string($conn, $inquiryID);

$sql = "DELETE FROM inquiries WHERE inquiry_id='$inquiryID'";
if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
} else {
    echo "Error deleting: " . mysqli_error($conn);
}

?>
