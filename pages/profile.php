<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
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
        <div class="logo"><a href="#"><?php echo htmlspecialchars($_SESSION["username"]) ?></a></div>

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


        <div class="formHolder" style = "width: 90vh;">

            <div class="logo center"><a href="../index.php">Profile</a></div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block;">Username: </h3>
                <h3 style= "display: inline-block; padding-left: 25px;"> Show username Here </h3>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block;">First Name: </h3>
                <h3 style= "display: inline-block; padding-left: 25px;"> Show First Name Here </h3>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block;">Last Name: </h3>
                <h3 style= "display: inline-block; padding-left: 25px;"> Show Last Name Here </h3>
        
            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block;">Last Name: </h3>
                <h3 style= "display: inline-block; padding-left: 25px;"> Show Last Name Here </h3>

            </div>

            <div style="padding-bottom: 25px; padding-left: 25px;">

                <h3 style= "display: inline-block;">Last Name: </h3>
                <h3 style= "display: inline-block; padding-left: 25px;"> Show Last Name Here </h3>

            </div>
            

            

        </div>

    </div>

    
    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>