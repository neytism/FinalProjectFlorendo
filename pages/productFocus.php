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

$temp_id = $_GET['productID'];

$sql = "SELECT itemName, description, imagePath, price, stock FROM products WHERE product_id='$temp_id'";

$result = mysqli_query($conn, $sql);

$tempProduct = mysqli_fetch_assoc($result);

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


    <div class="bodyholder login" style="background-image: url('../assets/Images/WebBackground3.png');">

        
    <div id="overlayWindow" style="position:fixed; height: 100vh; width: 100vw; z-index: 100; display:block;">
        <div style="height: 100%; width: 100%;padding: 8% 15%;">
            <div style="position: relative; height: 100%; width: 100%; background-color: white; border-radius: 30px; box-shadow: 0px 0px 50px rgba(0, 0, 0, 1);">
                <a href="products.php" type="button" class="close" style="position: absolute; right: 30px; top: 30px;" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                
                <div style="display: flex; justify-content: space-between; padding: 30px; height: 100%;">

                    <div style="width: 45%; display: flex; flex-direction: column; justify-content: space-between;">

                        <div style="flex-grow: 1; display: flex; align-items: center; height: 100%;">
                            <img src="<?php echo htmlspecialchars($tempProduct['imagePath']) ?>" alt="Product Image" style="height: 100%; width: 100%; object-fit: contain;">
                        </div>

                    </div>
                    
                    <div style="width: 45%;">
                        <h2><?php echo htmlspecialchars($tempProduct['itemName']) ?></h2>
                        <p><?php echo htmlspecialchars($tempProduct['description']) ?></p>
                        <p>Price: ₱ <?php echo htmlspecialchars($tempProduct['price']) ?></p>
                        <p>Stock: <?php echo htmlspecialchars($tempProduct['stock']) ?> remaining.</p>
                    </div>
                </div>


                <button type="button" class="btn btn-success" style="position: absolute; right: 30px; bottom: 30px;" aria-label="Save">
                    BUY NOW
                </button>
            </div>
        </div>
    </div>



    </div>


    <script type="text/javascript" src="../js/script.js" id="rendered-js"></script>

</body>

</html>