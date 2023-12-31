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
    <title>Sign up</title>
</head>

<body>

    <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">

    
        <div class="formHolder">

            <div class="logo center"><a href="../index.php">GIZMOVERSE</a></div>

            <h3 style="padding-bottom: 25px; text-align: center;">Sign up</h3>
            
            <form id="signupForm">
                
                <div>
                    <input type="text" id="inputUserName" placeholder="Username" required>
                </div>
                <div>
                    <input type="text" id="inputFirstName" placeholder="First Name" required>
                </div>
                <div>
                    <input type="text" id="inputLastName" placeholder="Last Name" required>
                </div>
                <div>
                    <input type="email" id="inputEmail" placeholder="Email" required>
                </div>
                <div>
                    <input type="text" id="inputPhone" placeholder="Phone" required>
                </div>
                <div>
                    <input type="text" id="inputAddress" placeholder="Address" required>
                </div>
                <div>
                    <input type="password" id="inputPassword" placeholder="Password" required>
                </div>
                <div>
                    <input type="password" id="inputRepeatPassword" placeholder="Repeat Password" required>
                </div>
                <div></div>
                <button type="submit" class="loginBtn submit" onclick="checkSignUp(event)">SignUp</button>
                <label class="warning" id="warningTextLogIn">wrong password</label>

                <div></div>

                <a href="login.php"><button type="button" class="loginBtn">Already have an account.</button></a>


            </form>

        </div>

    </div>

    <script src="../js/script.js"></script>

</body>

</html>