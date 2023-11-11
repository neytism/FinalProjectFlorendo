<?php

//THIS IS FOR ADMIN

//THIS IS FOR ADMIN

//THIS IS FOR ADMIN

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

if ($_SESSION['role'] != "admin") {
    header('location: login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "onlinestore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT user_id, username, firstName, lastName, email, mobile, address, role FROM profile';

$result = mysqli_query($conn, $sql);

$profiles = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/Images/iconS.png">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Users</title>
</head>

<body class="stillBackground">

    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="#">USERS LIST</a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
            </div>
        </ul>
    </nav>

    <div class="products">

        <form>
            <input id="search" type="text" autocomplete="off" placeholder="Search...">
        </form>

        <div class="container table-responsive py-5" style="color: black; font-family: LaachirDeeper !important;font-size: larger; width: 100%;">
            <table class="myTable table">
                <thead style="height: 60px;">
                    <tr style="letter-spacing: 1px;">
                        <th scope="col">ID</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CONTACT</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php

                    foreach ($profiles as $profile) { ?>

                        <tr class="cardHolder" style="height: 60px;">
                            <th scope="row"><?php echo htmlspecialchars($profile['user_id']) ?></th>
                            <td class="name"><?php echo htmlspecialchars($profile['username']) ?></td>
                            <td class="alt"><?php echo htmlspecialchars($profile['lastName'].", ".$profile['firstName']) ?></td>
                            <td class="description"><?php echo htmlspecialchars($profile['email']) ?></td>
                            <td ><?php echo htmlspecialchars($profile['mobile']) ?></td>
                            <td ><?php echo htmlspecialchars($profile['address']) ?></td>
                            <td >
                            <?php if($profile['user_id'] != $_SESSION['user_id']) { ?>
                                <a class="btn cart" style="color: white; background-color: gray;" role="button" onclick="deleteUser(event,<?php echo $profile['user_id'] ?>)">delete</a>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php }
                    
                    ?>

                </tbody>
            </table>
        </div>


    </div>


    <script type="text/javascript" src="../../js/script.js" id="rendered-js"></script>

</body>

</html>