<?php 
	session_start(); 

	if (isset($_SESSION['user_id'])) {
		header('location: ../index.php');
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/images/iconS.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Log in</title>
</head>

<body>

    <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">


        <div class="formHolder">

            <div class="logo center"><a href="../index.php">GIZMOVERSE</a></div>
            
            <h3 style="padding-bottom: 25px; text-align: center;">Login</h3>

            <form id="loginForm">
                <div>
                    <input type="text" id="inputUserName" placeholder="Username" required>
                </div>
                <div style="position:relative;">
                    <input type="password" id="inputPassword" placeholder="Password" required>
                    <button class="glyphicon glyphicon-eye-open" style="position:absolute; right: 11px; top: 25px; background-color:rgba(0,0,0,0); border:none; color: gray;" onclick="showPassword(event)" title="See Password" formnovalidate></button>
                </div>
                
                <div></div>
                <button type="submit" class="loginBtn submit" onclick="checkLogin(event)">Login</button>
                <label class="warning" id="warningTextLogIn"></label>

                <div></div>

                <a href="signup.php"><button type="button" class="loginBtn">Don't have an account.</button></a>


            </form>

        </div>

    </div>

    <script src="../js/script.js"></script>


</body>

</html>