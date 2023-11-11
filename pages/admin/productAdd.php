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

$productTypeEnum = get_enum_values('products', 'product_type');
    function get_enum_values( $table, $field )
    {
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
    
    $query = "SHOW COLUMNS FROM $table LIKE '$field'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $type = $row['Type'];
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $enum_values = explode("','", $matches[1]);
    
    return $enum_values;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    
    
    $errors = array(
        'itemName' => '',
        'itemDesc' => '',
        'itemImage' => '',
        'itemPrice' => '',
        'itemStock' => '',
        'itemProductType' => '',
        'itemBrandModel' => ''
    );

    $itemName = $_POST['itemName'];
    $itemDesc = $_POST['itemDesc'];
    $itemPrice = $_POST['itemPrice'];
    $itemStock = $_POST['itemStock'];
    $itemProductType = $_POST['itemProductType'];
    $itemBrandModel = $_POST['itemBrandModel'];

    if(isset($_FILES['itemImage'])) {
        $itemImage = $_FILES['itemImage'];
    }
    
    if (empty($itemName)) {
        $errors['itemName'] = '-Item Name is required';
    } else {
        if (strlen($itemName) > 200) {
            $errors['itemName'] = '-Invalid, too long.';
        }
    }

    if (empty($itemDesc)) {
        $errors['itemDesc'] = '-Description is required';
    } 

    if (empty($itemPrice)) {
        $errors['itemPrice'] = '-Price is required';
    } 

    if (empty($itemStock)) {
        $errors['itemStock'] = '-Stock is required';
    } 

    if (empty($itemProductType) || $itemProductType == "Set Product Type") {
        $errors['itemProductType'] = '-Product Type is required';
    }

    if (empty($itemBrandModel)) {
        $errors['itemBrandModel'] = '-Brand/Model is required';
    }
    

    if (empty($itemImage['name'])) {
        $errors['itemImage'] = '-Image is required';
    } else {
        $base_dir = "../assets/Images/";
        $target_dir = "../".$base_dir;
        $target_file = $target_dir . basename($itemImage["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $newFileName = $itemBrandModel . "-" . $itemName . "." . $imageFileType;
        $newFilePath = $target_dir . $newFileName;
        $relativeFilePath = $base_dir . $newFileName;
    
        // Check if file already exists
        if (file_exists($newFilePath)) {
            $errors['itemImage'] = '-File already exists';
        }
    
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
        
        $sql = "INSERT INTO products(itemName,imagePath,description,price,stock,brand_model,product_type) VALUES('$itemName','$itemImage','$itemDesc','$itemPrice','$itemStock','$itemBrandModel','$itemProductType')";
        
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
    <title>Add Product</title>
</head>

<body style="background-color: rgb(10, 10, 10);">


    <div class="bodyholder login" style="background-image: url('../../assets/Images/WebBackground3.png');">


        <div class="formHolder" style="width: 60%;">

            <div class="logo center"><a href="productList.php">ADD PRODUCT</a></div>

            <form id="addProductForm">

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">ITEM NAME: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" 69%type="text" id="inputItemName" placeholder="Item Name" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">BRAND/MODEL: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="text" id="inputBrandModel" placeholder="Brand/Model" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">
                    <h3 style="display: inline-block; width: 30%;">PRODUCT TYPE: </h3>
                    <select style="display: inline-block !important; padding: 0px 25px; width:69%; min-height: 75px;" id="inputProductType" required>
                        <?php
                            foreach($productTypeEnum as $type) {
                                echo "<option value='".htmlspecialchars($type)."'>".htmlspecialchars($type)."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">DESCRIPTION: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="text" id="inputItemDescription" placeholder="Description" required>
                
                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">Image: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="file" accept="image/*" id="inputItemImage" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">PRICE: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="number" id="inputItemPrice" placeholder="Price" required>

                </div>

                <div style="padding-bottom: 0px; padding-left: 25px;">

                    <h3 style="display: inline-block; width: 30%;">STOCK: </h3>
                    <input style="display: inline-block !important; padding: 25px 25px; width:69%;" type="number" id="inputItemStock" placeholder="Stock" required>
                
                </div>

                 <div style="text-align:center; padding: 30px 0px 0px 0px; padding-left: 25px; width:100%;">

                    <button type="submit" class="loginBtn submit" style="display: inline-block !important; padding: 20px 20px; width: 200px; margin-right: 20px;" onclick="checkAddProd(event, 'productAdd.php','')">SUBMIT</button>
                    <a  class="loginBtn cancel" style="display: inline-block !important; padding: 20px 20px; width: 200px; margin-left: 20px;" href="productList.php">CANCEL</a>
                </div>

                <label class="warning" id="warningText">wrong password</label>


            </form>


           




        </div>

    </div>


    <script type="text/javascript" src="../../js/script.js" id="rendered-js"></script>

</body>

</html>