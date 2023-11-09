<?php 
	session_start(); 

	if (!isset($_SESSION['user_id'])) {
		header('location: login.php');
	}

    if ($_SESSION['role'] != "admin") {
		header('location: login.php');
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
    <link rel="icon" type="image/x-icon" href="../assets/Images/iconS.png">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>

<body style="background-color: rgb(10, 10, 10);">

    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="#">GIZMOVERSE ADMIN</a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../profile.php?logout='1'" style="color: red;">Log out</a></li>
            </div>
        </ul>
    </nav>

    <!-- Buttons in the middle of the screen -->
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; margin-top: -80px;">
        <a href="productList.php" class="btn" style="margin-right: 30px; background-color: white; padding: 30px 0px; width: 250px; box-shadow: 0px 0px 100px rgba(77, 77, 77, 1);">Product List</a>
        <a href="userList.php" class="btn"style="margin-left: 30px; background-color: white; padding: 30px 0px;width: 250px; box-shadow: 0px 0px 100px rgba(77, 77, 77, 1);" >User List</a>
    </div>

    <script type="text/javascript" src="../../js/script.js" id="rendered-js"></script>

</body>

</html>