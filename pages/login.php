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

            <div class="logo login"><a href="../index.html">GIZMOVERSE</a></div>


            <h3 style="padding-bottom: 25px; text-align: center;">Login</h3>
            <form>
                <div>
                    <label>Username</label>
                    <input type="text" id="inputUserName" placeholder="UserName">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" id="inputPassword" placeholder="Password">
                </div>
                <div></div>
                <button type="button" class="loginBtn submit" onclick="checkLogIn()">Login</button>
                <label class="warning" id="warningTextLogIn">wrong password</label>

                <div></div>

                <a href="signup.php"><button type="button" class="loginBtn">Don't have an account.</button></a>


            </form>

        </div>

    </div>

    <script src="../js/script.js"></script>

</body>

</html>