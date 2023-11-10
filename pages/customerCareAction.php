<?php
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
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'text' => ''
);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$concern = $_POST['concern'];


$fname = ucfirst($fname);
if (empty($fname)) {
    $errors['firstName'] = '-First name is required';
} else {
    if (strlen($fname) > 200) {
        $errors['firstName'] = '-Invalid, too long.';
    } 
}


$lname = ucfirst($lname);
if (empty($lname)) {
    $errors['lastName'] = '-Last name is required';
} else {
    if (strlen($lname) > 200) {
        $errors['lastName'] = '-Invalid, too long.';
    } 
}


$email = strtolower($email);
if(empty($email)){
    $errors['email'] = '-An email is required';
} else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = '-Email must be a valid email address';
    }
}

$phone = trim($phone); 
if (empty($phone)) {
    $errors['phone'] = '-Phone number is required';
} else {
    if (strlen($phone) > 15) {
        $errors['phone'] = '-Invalid phone number, too long.';
    } elseif (!preg_match('/^[0-9]+$/', $phone)) {
        $errors['phone'] = '-Invalid phone number, contains non-digit characters.';
    }
}


if (empty($concern)) {
    $errors['text'] = '-input is required.';
} 


if (array_filter($errors)) {
    echo implode("\n", array_filter($errors));
} else {
    
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $concern = mysqli_real_escape_string($conn, $concern);
    
    $sql = "INSERT INTO inquiries(firstName,lastName,email,contact,inquiry) VALUES('$fname','$lname','$email','$phone','$concern')";
    
    mysqli_query($conn, $sql);
    echo "success";

}

function HasSpecialCharacters($str)
{
    return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $str);
}
?>