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
    'username' => '',
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'phone' => '',
    'address' => '',
    'password' => '',
    'repeatPassword' => ''
);

$uname = $_POST['uname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pword = $_POST['pword'];
$rpword = $_POST['rpword'];


// check username
$uname = strtolower($uname);
if (empty($uname)) {
    $errors['username'] = '-Username is required.';
} else {
    $sql = "SELECT * FROM profile WHERE username = '$uname'";

    $result = $conn->query($sql);

    if (strlen($uname) < 8) {
        $errors['username'] = '-Username must be atleast 8 characters.';
    } elseif (HasSpecialCharacters($uname)) {
        $errors['username'] = '-Invalid Username.';
    } elseif (strlen($uname) < 8 && HasSpecialCharacters($uname)) {
        $errors['username'] = '-Invalid and short Username.';
    } elseif ($result->num_rows > 0) {
        $errors['username'] = '-Username is Taken.';
    } 
}

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

if (empty($address)) {
    $errors['address'] = '-Address is required';
} else {
    if (strlen($address) > 200) {
        $errors['address'] = '-Invalid, too long.';
    } 
}

if (empty($pword)) {
    $errors['password'] = '-Password is required.';
} else {
    if (strlen($uname) < 8) {
        $errors['password'] = '-Password must be atleast 8 characters.';
    } 
}

if (!empty($pword) && $rpword != $pword) {
    $errors['repeatPassword'] = '-Password did not match';
}

if (array_filter($errors)) {
    echo implode("\n", array_filter($errors));
} else {
    
    $uname = mysqli_real_escape_string($conn, $uname);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $address = mysqli_real_escape_string($conn, $address);
    $pword = mysqli_real_escape_string($conn, $pword);

    $sql = "INSERT INTO profile(username,password,firstName,lastName,email,mobile,address) VALUES('$uname','$pword','$fname','$lname','$email','$phone','$address')";

    mysqli_query($conn, $sql);
    echo "success";

}

function HasSpecialCharacters($str)
{
    return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $str);
}
?>