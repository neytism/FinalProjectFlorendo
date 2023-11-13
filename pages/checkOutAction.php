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

if (isset($_SESSION['orderIDs'])) {
    $orderIDs = $_SESSION['orderIDs'];

    foreach ($orderIDs as $orderID) {
        
        $sql = "UPDATE orders SET status = 'Processing' WHERE order_id = '$orderID'";
        

        if (mysqli_query($conn, $sql)) {
            echo "updated successfully";
        } else {
            echo "Error updating: " . mysqli_error($conn);
        }
    }

    
    unset($_SESSION['orderIDs']);
} else {
    echo "No order IDs found in session.";
}
?>
