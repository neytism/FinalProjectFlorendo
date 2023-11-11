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

$sql = 'SELECT product_id, product_type, brand_model, itemName, description, imagePath, price, stock FROM products';

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

<body class="stillBackground">
    
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
                <li><a href="productAdd.php">Add Product</a></li>
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
                        <th scope="col">IMAGE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">IMAGE PATH</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">PRICE</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    
                    foreach ($products as $product) { ?>

                        <tr class="cardHolder" >
                            <th  scope="row"><?php echo htmlspecialchars($product['product_id']) ?></th>

                            <td ><img src="../<?php echo htmlspecialchars($product['imagePath']) ?>"
                                style="height: 80px; width: 80px; object-fit: contain;" alt="<?php echo htmlspecialchars($product['description']) ?>"></td>

                            <td class="name" ><?php echo htmlspecialchars($product['itemName']) ?></td>
                            <td class="alt" style="display:none;"><?php echo htmlspecialchars($product['product_type']) ?></td>
                            <td class="description"><?php echo htmlspecialchars($product['brand_model'].": ".$product['description']) ?></td>
                            <td ><?php echo htmlspecialchars($product['imagePath']) ?></td>
                            <td ><?php echo htmlspecialchars($product['stock']) ?></td>
                            <td >₱<?php echo htmlspecialchars($product['price']) ?></td>
                            <td ><a href="productEdit.php?productID=<?php echo $product['product_id'] ?>" class="btn cart"
                                    style="color: white; background-color: gray;" role="button">edit</a></td>
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