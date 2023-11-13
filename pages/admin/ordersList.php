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

$sql = 'SELECT orders.order_id, orders.product_id, orders.quantity, products.itemName, products.price, profile.user_id, profile.username, orders.status
FROM orders
INNER JOIN products ON orders.product_id = products.product_id
INNER JOIN profile ON orders.user_id = profile.user_id';

$results = mysqli_query($conn, $sql);

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
                        <th scope="col">ITEM</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">USER</th>
                        <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php

                    foreach ($results as $result) { ?>
                        
                        <tr class="cardHolder" style="height: 60px;">
                            <th scope="row" ><?php echo htmlspecialchars($result['order_id']) ?></th>
                            <td class="name"><?php echo htmlspecialchars($result['product_id']." : ".$result['itemName']) ?></td>
                            <td ><?php echo htmlspecialchars($result['quantity']." x ".$result['price']) ?></td>
                            <td class="description"><?php echo htmlspecialchars($result['user_id']." : ".$result['username']) ?></td>
                            <td class="alt">
                                <?php 
                                    $status = htmlspecialchars($result['status']);
                                    $color = "";
                                    switch ($status) {
                                        case "OnCart":
                                            $color = "black";
                                            break;
                                        case "Cancelled":
                                            $color = "red";
                                            break;
                                        case "Delivered":
                                            $color = "blue";
                                            break;
                                        case "Completed":
                                            $color = "green";
                                            break;
                                        case "Returned":
                                            $color = "orange";
                                            break;
                                        case "Processing":
                                            $color = "gray";
                                            break;
                                        case "InTransit":
                                            $color = "cyan";
                                            break;
                                        case "OrderProblem":
                                            $color = "darkred";
                                            break;
                                        case "PickUpAvailable":
                                            $color = "purple";
                                            break;
                                    }
                                    echo "<span style='color: $color;'>$status</span>";
                                ?>
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