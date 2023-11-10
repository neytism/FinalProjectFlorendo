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

$userID = $_POST['userID'];

$userID = mysqli_real_escape_string($conn, $userID);

$sql = "DELETE FROM profile WHERE user_id ='$userID'";
if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
} else {
    echo "Error deleting: " . mysqli_error($conn);
}

?>
