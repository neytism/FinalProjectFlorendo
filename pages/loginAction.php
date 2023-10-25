<?php
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

$uname = $_POST['uname'];
$pword = $_POST['pword'];

if(empty($uname)){ 
    echo "Username Required";
    return;
}

$sql = "SELECT * FROM profile WHERE username = '$uname'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row["password"] == $pword)
        {
            echo "success";
        }else {
            echo "Incorrect password or username.";
        }
  }
} else {
  echo "Incorrect password or username.";
}

$conn->close();
?>
