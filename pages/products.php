<?php
session_start();

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

$sql = 'SELECT product_id, itemName, description, imagePath, price, stock, product_type, brand_model FROM products ORDER BY CAST(product_type AS CHAR) ASC';


$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en" style=" scroll-behavior: auto;">

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

<body class="stillBackground" >


    <div class="notification" id="notification">
        <p style="padding: 10px 20px; margin:0;">Item Added to Cart</p>
    </div>

    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="../index.php">GIZMOVERSE</a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">

                <li><a href="../index.php">Home</a></li>
                <li><a href="customercare.php">Contact</a></li>
                <li><?php if (isset($_SESSION['user_id'])) {
                echo "<a href=\"cart.php\">Cart</a>";
              } else {
                echo "<a href=\"login.php\">Log in</a>";
              } ?></li>
            </div>
        </ul>
    </nav>
    
    <a id="goToTop" style="background-color: white; height: 70px; width: 70px; display: none; justify-content: center; align-items: center; border-radius: 50%; position: fixed; bottom: 15px; right: 15px; z-index: 100; border: 1px solid gray; text-decoration: none;" href="#">TOP</a>

    
    

    <div class="products">

        <form>
            <input id="search" type="text" autocomplete="off" placeholder="Search...">
        </form>


        <div id="productsSection" >

            <?php

            foreach ($products as $product) { 
                
                if ($product['stock'] == 0) {
                    continue;
                }
                
                ?>
                
                <div id="cardHolder" class="cardHolder col-xs-12 col-sm-6 col-md-3" onclick="location.href='productFocus.php?productID=<?php echo htmlspecialchars($product['product_id']) ?>'">
                    <div id="<?php echo htmlspecialchars($product['product_id']) ?>" class="card">
                            <img src="<?php echo htmlspecialchars($product['imagePath']) ?>"
                                alt="<?php echo htmlspecialchars($product['description']) ?>" class="img-responsive">

                            <div class="caption">
                                <h3 id="productLabel" class="productLabel name alt">
                                    <?php echo htmlspecialchars($product['itemName']) ?>
                                </h3>

                                <p style="display:none;" id="productDesc" class="productDesc description">
                                    <?php echo htmlspecialchars($product['description']) ?>
                                </p>

                                <p class="btnHolder">

                                    <a style="pointer-events: none;"
                                        class="btn buy" role="button">₱
                                        <?php echo htmlspecialchars($product['price']) ?>
                                    </a>
                
                                    <a class="btn cart" role="button" <?php if (!isset($_SESSION["user_id"])) {
                                        echo 'href="login.php"';
                                    } else {
                                        echo 'onclick="event.stopPropagation(); addToCart(event,' . $product['product_id'] . ')"';
                                    } ?>>
                
                                        <span style="color: black;" class="glyphicon glyphicon-shopping-cart">
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