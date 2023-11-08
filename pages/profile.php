<?php 
	session_start(); 

	if (!isset($_SESSION['user_id'])) {
		header('location: login.php');
	} else{

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
      
        $sql = "SELECT * FROM profile WHERE user_id = '$_SESSION[user_id]'";
      
        $result = $conn->query($sql);
      
        while ($row = $result->fetch_assoc()) {
      
          $uname = $row["username"];
          $firstName = $row["firstName"];
          $lastName = $row["lastName"];
          $email = $row["email"];
          $num = $row["mobile"];
          $address = $row["address"];
      
        }
    }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user_id']);
        unset($_SESSION['role']);
		header("location: ../index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/iconS.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Profile</title>
</head>

<body style="background-color: rgb(10, 10, 10);">

    <nav class="navigationbar">
        <!-- LOGO -->
        <div class="logo"><a href="#"><?php echo htmlspecialchars($uname) ?></a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="profile.php?logout='1'" style="color: red;">Log out</a></li>
            </div>
        </ul>
    </nav>

     <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">


        <div class="formHolder" style = "width: 70%;">

            <div class="logo center"><a href="../index.php">Profile</a></div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">Username: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($uname) ?></h4>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">First Name: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($firstName) ?></h4>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">Last Name: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($lastName) ?></h4>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">Email: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($email) ?></h4>

            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">Mobile Number: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($num) ?></h4>

            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block; width: 30%;">Address: </h3>
                <h4 style= "display: inline-block; padding-left: 5px;"><?php echo htmlspecialchars($address) ?></h4>

            </div>
            

            

        </div>

    </div>

    
    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>