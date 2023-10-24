<?php
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

$sql = 'SELECT itemName, description, imagePath, price, stock FROM products';

$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
    <title>Products</title>
</head>

<body style="background-color: rgb(10, 10, 10);">

    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="../index.html">GIZMOVERSE</a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">

                <li><a href="../index.html">Home</a></li>
                <li><a href="../index.html">About Us</a></li>

                <li>
                    <a href="products.php">Products</a>
                </li>

                <li><a href="customercare.html">Contact</a></li>
                <li><a href="login.php">Log in</a></li>
            </div>
        </ul>
    </nav>

    <div class="products">

        <form>
            <input id="search" type="text" autocomplete="off" placeholder="Search...">
        </form>


        <div id="productsSection">

            <?php

            foreach ($products as $product) { ?>

                <div id="cardHolder" class="col-md-3">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($product['imagePath']) ?>"
                            alt="<?php echo htmlspecialchars($product['itemName']) ?>" class="img-responsive">
                        <div class="caption">
                            <h3 id="productLabel">
                                <?php echo htmlspecialchars($product['itemName']) ?>
                            </h3>
                            <p id="productDesc">
                                <?php echo htmlspecialchars($product['description']) ?>
                            </p>
                            <p class="btnHolder">
                                <a href="#" class="btn buy" role="button">₱
                                    <?php echo htmlspecialchars($product['price']) ?>
                                </a>
                                <a href="#" class="btn cart" role="button">
                                    <span class="glyphicon glyphicon-shopping-cart">
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php }

            ?>

        </div>




    </div>
    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>