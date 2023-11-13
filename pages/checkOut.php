<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

if (isset($_POST['orderIDsFromCart'])) {
    $_SESSION['orderIDs'] = json_decode($_POST['orderIDsFromCart']);
}

$totalAmount = 0;

if (isset($_SESSION['orderIDs'])) {
    $orderIDs = $_SESSION['orderIDs'];
    $userID = $_SESSION['user_id'];
    
    // Convert orderIDs array to comma-separated string
    $orderIDsStr = implode(',', $orderIDs);
    
    // Prepare SQL query
    $orderSql = "SELECT orders.order_id, orders.quantity, products.itemName, products.price, products.imagePath
            FROM orders
            INNER JOIN products ON orders.product_id = products.product_id
            WHERE orders.order_id IN ($orderIDsStr) AND orders.user_id = $userID";
    
    $products = mysqli_query($conn, $orderSql);

    while ($product = mysqli_fetch_assoc($products)) {
        $totalAmount += $product['quantity'] * $product['price'];
    }
}

$sql = "SELECT * FROM profile WHERE user_id = '$_SESSION[user_id]'";
      
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  
  $uname = $row["username"];
  $firstName = $row["firstName"];
  $lastName = $row["lastName"];
  $email = $row["email"];
  $num = $row["mobile"];
  $address = $row["address"];

}


    
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
    <title>Add Product</title>
</head>

<body style="background-color: rgb(10, 10, 10);">
    
<div onclick="location.href = 'cart.php';" id="thanks" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); color: white; display: none; justify-content: center; align-items: center; z-index: 130;">
    THANK YOU FOR PURCHASING
</div>
    
    

    <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">

        
    <div id="checkOutModal" style="position:fixed; height: 100vh; width: 100vw; z-index: 100; display:block;">
        <div style="height: 100%; width: 100%;padding: 8% 15%;">
            <div style="position: relative; height: 100%; width: 100%; background-color: white; border-radius: 30px; box-shadow: 0px 0px 50px rgba(0, 0, 0, 1);">
                <a onclick="location.href = 'cart.php';" type="button" class="close" style="position: absolute; right: 30px; top: 30px;" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                
                <div style="display: flex; justify-content: space-between; padding: 30px; height: 100%;">
                    <!-- left -->
                    <div style="width: 49%; display: flex; flex-direction: column; justify-content: space-between;">

                    <div class="container table-responsive py-5" style="color: black; font-family: LaachirDeeper !important;font-size: larger; width: 100%;">
                        <table class="myTable table">
                            
                            <tbody>

                                <?php
                                
                                    foreach ($products as $product) { ?>

                                        <tr class="cardHolder" style="background-color: rgba(0,0,0,0.05);">
                                            
                                            <td style="width: 55px;"><img src="<?php echo htmlspecialchars($product['imagePath']) ?>"
                                                style="height: 50px; width: 50px; object-fit: contain;"></td>

                                            <td class="name" ><?php echo htmlspecialchars($product['itemName']) ?></td>
                            
                    
                                            <td style="text-align: right !important; padding-right: 25px;">₱ <?php echo htmlspecialchars($product['price']. ' x ' .$product['quantity']) ?></td>
                                        
                                        </tr>
                                    <?php }
                                
                                ?>
                            
                                
                            
                            </tbody>
                        
                        </table>

                    </div>
                    
                    </div>
                    
                    <!-- right -->
                    <div style="width: 49%;">
                        <h2>CHECKOUT</h2>
                        <p><?php echo htmlspecialchars($address) ?></p>
                        <p><?php echo htmlspecialchars($num) ?></p>
                        <p><?php echo htmlspecialchars($email) ?></p>
                        <p><?php echo htmlspecialchars($lastName .', '. $firstName) ?></p>
                        <p>TOTAL AMOUNT: ₱ <?php echo htmlspecialchars($totalAmount) ?><br><br></p>
                        <p>Mode of payment</p>
                        <select onchange="changeMOP()" name="modeOfPayment" id="modeOfPayment" style="background-color: rgba(0,0,0,0.05); color: black; margin-bottom: 10px;">
                            <option value="COD">Cash on Delivery</option>
                            <option value="CC">Credit Card</option>
                        </select>
                        <div id="mopHolder" >
                        
                        </div>
                    </div>
                </div>

                
                <button onclick="confirmCheckOut()" type="button" class="btn btn-success" style="position: absolute; right: 30px; bottom: 30px;" aria-label="Save">
                    CONFIRM
                </button>
            
            </div>
        </div>
    </div>



    </div>


    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>