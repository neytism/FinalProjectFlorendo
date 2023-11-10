<?php
session_start();

if (!isset($_SESSION['user_id'])) {
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

$userID = $_SESSION['user_id'];
$totalAmount = 0;
$totalQuantity = 0;

$sql = "SELECT cart.order_id, cart.product_id, cart.quantity, products.itemName, products.imagePath, products.price FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id='$userID'";

$result = mysqli_query($conn, $sql);

$cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/Images/iconS.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Cart</title>
</head>

<body class="stillBackground">

    <div style="position: fixed; z-index: 100; width:100vw; bottom: 0; height: 100px; background-color: white; box-shadow: 0px -10px 100px black; border-radius: 30px 30px 0px 0px; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
        <div></div>
        <div style="display: flex; align-items: center; vertical-align: center;">
            <h3 style="margin-right: 20px;">SUBTOTAL: </h3>
            <h3 class="total-amount" style="margin-right: 50px;">₱ 0.00</h3>
            <a href="#" class="total-quantity btn cart"
                style="color: white; background-color: gray; margin-right: 30px; align-self: center;"
                role="button">CHECKOUT(0)</a>
            <h3 style="margin-right: 20px;"></h3>
        </div>

    </div>



    <nav class="navigationbar sticky">
        <!-- LOGO -->
        <div class="logo"><a href="#">GIZMOVERSE</a></div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="products.php">Shop</a></li>
                <li><a href="profile.php">Profile</a></li>
            </div>
        </ul>
    </nav>

    <div class="products">

        <div class="container table-responsive py-5"
            style="color: black; font-family: LaachirDeeper !important;font-size: larger; width: 100%;">
            <table class="myTable table" id="tableContainer">
                <thead style="height: 60px;">
                    <tr style="letter-spacing: 1px;">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">ITEM NAME</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($cartItems as $cartItem) { ?>
                        <tr class="cardHolder" style="height: 85px;">
                            <td><input class="cart-checkbox" style="display: block; height: 20px;" type="checkbox"
                                    name="checkbox_<?php echo $cartItem['product_id'] ?>" /></td>
                            <td style="width: 20%;"><img src="<?php echo htmlspecialchars($cartItem['imagePath']) ?>"
                                    style="height: auto; width: auto; max-width: 100px; max-height: 80px;"
                                    alt="<?php echo htmlspecialchars($cartItem['itemName']) ?>"></td>
                            <td style="width: 50%;" class="name">
                                <?php echo htmlspecialchars($cartItem['itemName']) ?>
                            </td>
                            <td class="quantity">
                                <?php echo htmlspecialchars($cartItem['quantity']) ?>
                            </td>
                            <td class="price">₱
                                <?php echo htmlspecialchars($cartItem['price']) ?>
                            </td>
                            <td><a onclick="removeItemFromCart(event,<?php echo $cartItem['order_id'] ?>)" class="btn cart"
                                    style="color: white; background-color: gray;" role="button">REMOVE</a></td>
                        </tr>
                    <?php } ?>

                    <?php
                    if (count($cartItems) > 0) {
                        foreach ($cartItems as $cartItem) { ?>
                            <tr class="cardHolder">
                                <!-- Your existing table row code here -->
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" style="text-align: center; border-radius: 20px; background-color: gray;">No
                                items in your cart</td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>


    </div>


    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>