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
    <title>customer care</title>
</head>

<body>

    <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">

        <div class="formHolder customer-care">

            <div class="logo center"><a href="../index.php">We're here to help</a></div>

            <p>We love hearing from from our customers and we value your feedback. Send us your questions, comments or feedback so we can serve you better.</p>

            <form>
                <div>
                    <label>First Name</label>
                    <input type="text" id="inputFirstName" placeholder="First Name">
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" id="inputLastName" placeholder="Last Name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" id="inputEmail" placeholder="Email">
                </div>
                <div>
                    <label>Contact Number</label>
                    <input type="tel" id="inputPhone" placeholder="Contact Number">
                </div>
                <div>
                    <label>What do you have in mind?</label>
                    <textarea id="inputConcern" rows="4" cols="50" placeholder="Please enter query"></textarea>
                </div>
                <div></div>
                <a style="color: white;"><button type="button" class="loginBtn submit" onclick="checkInquiry(event)">Submit</button></a>
                <label class="warning" id="warningTextLogIn"></label>


            </form>

        </div>

    </div>

    <script src="../js/script.js"></script>

</body>

</html>