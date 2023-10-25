<?php

//THIS IS FOR ADMIN

//THIS IS FOR ADMIN

//THIS IS FOR ADMIN

session_start();

if (!isset($_SESSION['username'])) {
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

$sql = 'SELECT product_id, itemName, description, imagePath, price, stock FROM products';

$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);



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
    <title>Products</title>
</head>

<body style="background-color: rgb(10, 10, 10);">

    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="#">PRODUCT LIST</a></div>

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
            <table class="table table-bordered" style="background-color: white; vertical-align: middle;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">product ID</th>
                        <th scope="col">image</th>
                        <th scope="col">item name</th>
                        <th scope="col">description</th>
                        <th scope="col">image path</th>
                        <th scope="col">stock</th>
                        <th scope="col">price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($products as $product) { ?>

                        <tr id="cardHolder">
                            <th style="vertical-align: middle;" scope="row"><?php echo htmlspecialchars($product['product_id']) ?></th>
                            <td style="vertical-align: middle;"><img src="../<?php echo htmlspecialchars($product['imagePath']) ?>"
                                    style="height: 100px; width: auto;" alt="<?php echo htmlspecialchars($product['itemName']) ?>"></td>
                            <td id="productLabel" style="vertical-align: middle;"><?php echo htmlspecialchars($product['itemName']) ?></td>
                            <td id="productDesc"style="vertical-align: middle;"><?php echo htmlspecialchars($product['description']) ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($product['imagePath']) ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($product['stock']) ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($product['price']) ?></td>
                            <td style="vertical-align: middle;"><a href="#" class="btn cart"
                                    style="color: white; background-color: gray;" role="button">edit</a></td>
                        </tr>
                    <?php }

                    ?>

                </tbody>
            </table>
        </div>


        <!-- <div id="productsSection">

            <?php

            //foreach ($products as $product) { ?>

                <div id="cardHolder" class="col-md-12" >
                    <div class="card" style= "display: flex; flex-direction: row; width: 100%;" >
                        <div class="caption">
                            <h3 id="productLabel">
                                <?php //echo htmlspecialchars($product['itemName']) ?>
                            </h3>
                            <p id="productDesc">
                                <?php // echo htmlspecialchars($product['description']) ?>
                            </p>
                            <img src="../<?php //echo htmlspecialchars($product['imagePath']) ?>"
                            alt="<?php //echo htmlspecialchars($product['itemName']) ?>"style="height: 100px; width: auto;">
                            <p>
                                <?php //echo htmlspecialchars($product['imagePath']) ?>
                            </p>
                            <p>
                                Stock: <?php //echo htmlspecialchars($product['stock']) ?>
                            </p>
                            <p class="btnHolder">
                                <a href="#" class="btn buy" role="button">₱
                                    <?php //echo htmlspecialchars($product['price']) ?>
                                </a>
                                <a href="#" class="btn cart" role="button">
                                    edit
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php //}
            
            ?>

        </div> -->


    </div>


    <script type="text/javascript" src="../../js/script.js" id="rendered-js"></script>

</body>

</html>