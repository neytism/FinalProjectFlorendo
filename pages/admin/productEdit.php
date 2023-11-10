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
$dbname = "onlinestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$temp_id = isset($_GET['productID']) ? $_GET['productID'] : null;

$sql = "SELECT itemName, description, imagePath, price, stock FROM products WHERE product_id='$temp_id'";
$result = mysqli_query($conn, $sql);
$tempProduct = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $errors = array(
        'itemName' => '',
        'itemDesc' => '',
        'itemImage' => '',
        'itemPrice' => '',
        'itemStock' => ''
    );
    
    $itemID = $_POST['itemID'];
    $itemName = $_POST['itemName'];
    $itemDesc = $_POST['itemDesc'];
    $itemPrice = $_POST['itemPrice'];
    $itemStock = $_POST['itemStock'];
    $itemImage = '';

    $sql = "SELECT itemName, description, imagePath, price, stock FROM products WHERE product_id='$itemID'";
$result = mysqli_query($conn, $sql);
$tempProduct = mysqli_fetch_assoc($result);
    
    if(isset($_FILES['itemImage'])) {
        $itemImage = $_FILES['itemImage'];
    } else{
        $itemImage = $tempProduct['imagePath'];
    }
    
    if (empty($itemName)) {
        $itemName = $tempProduct['itemName'];
    } else {
        if (strlen($itemName) > 200) {
            $errors['itemName'] = '-Invalid, too long.';
        }
    }

    if (empty($itemDesc)) {
        $itemDesc = $tempProduct['description'];
    } 

    if (empty($itemPrice)) {
        $itemPrice = $tempProduct['price'];
    } 

    if (empty($itemStock)) {
        $itemStock = $tempProduct['stock'];
    } 

    

    if (empty($itemImage['name'])) {
        $itemImage = $tempProduct['imagePath'];
    } else {
        $base_dir = "../assets/Images/";
        $target_dir = "../".$base_dir;
        $target_file = $target_dir . basename($itemImage["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $newFileName = $itemName . "." . $imageFileType;
        $newFilePath = $target_dir . $newFileName;
        $relativeFilePath = $base_dir . $newFileName;
    
    
        if ($itemImage["size"] > 500000) {
            $errors['itemImage'] = '-File is too large';
        }
    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $errors['itemImage'] = '-Only JPG, JPEG, PNG & GIF files are allowed';
        }
    
        if (!array_filter($errors)) {
            if (move_uploaded_file($itemImage["tmp_name"], $newFilePath)) {
                $itemImage = $relativeFilePath;
            } else {
                $errors['itemImage'] = '-There was an error uploading your file';
            }
        }
    }
    
    

    if (array_filter($errors)) {
        echo implode("\n", array_filter($errors));
    } else {
        $itemName = mysqli_real_escape_string($conn, $itemName);
        $itemDesc = mysqli_real_escape_string($conn, $itemDesc);
        $itemPrice = mysqli_real_escape_string($conn, $itemPrice);
        $itemStock = mysqli_real_escape_string($conn, $itemStock);
        
        $sql = "UPDATE products SET itemName='$itemName', imagePath='$itemImage', description='$itemDesc', price='$itemPrice', stock='$itemStock' WHERE product_id='$itemID'";
        
        
        mysqli_query($conn, $sql);
        echo "success";
    }
    
    
return;
}



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
    <title>Edit Product</title>
</head>

<body style="background-color: rgb(10, 10, 10);">


    <div class="bodyholder login" style="background-image: url('../../assets/Images/WebBackground3.png');">


        <div class="formHolder" style="width: 60%;">

            <div class="logo center"><a href="productList.php">EDIT PRODUCT</a></div>

            <form id="addProductForm">

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">ITEM NAME: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" 69%type="text" id="inputItemName" placeholder="Item Name" value="<?php echo htmlspecialchars($tempProduct['itemName']) ?>" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">
                    
                    <h3 style="display: inline-block; width: 30%;">DESCRIPTION: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="text" id="inputItemDescription" placeholder="Description" value="<?php echo htmlspecialchars($tempProduct['description']) ?>" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 22%;">Image: </h3>
                    <img src="../<?php echo htmlspecialchars($tempProduct['imagePath']) ?>"
                                style=" display: inline-block !important; height: 80px; width: 80px; object-fit: contain;" alt="<?php echo htmlspecialchars($product['description']) ?>">
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="file" accept="image/*" id="inputItemImage" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">PRICE: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="number" id="inputItemPrice" placeholder="Price" value="<?php echo htmlspecialchars($tempProduct['price']) ?>" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">STOCK: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="number" id="inputItemStock" placeholder="Stock" value="<?php echo htmlspecialchars($tempProduct['stock']) ?>" required>

                </div>

                 <div style="text-align:center; padding: 30px 0px 0px 0px; padding-left: 25px; width:100%;">
                    
                    <button type="submit" class="btn btn-success" style="display: inline-block !important; padding: 20px 20px; width: 200px; margin-right: 20px;" onclick="checkAddProd(event, 'productEdit.php', <?php echo htmlspecialchars($temp_id) ?>)">SUBMIT</button>
                    <button class="btn btn-danger" style="display: inline-block !important; padding: 20px 20px; width: 200px;" onclick="deleteItem(event,<?php echo $temp_id ?>)" formnovalidate>DELETE</button>
                    <a  class="loginBtn cancel" style="display: inline-block !important; padding: 20px 20px; width: 200px; margin-left: 20px;" href="productList.php">CANCEL</a>
                </div>

                <label class="warning" id="warningText">wrong password</label>

            
            </form>


           




        </div>

    </div>


    <script type="text/javascript" src="../../js/script.js" id="rendered-js"></script>

</body>

</html>