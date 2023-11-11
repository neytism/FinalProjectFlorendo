<?php
session_start();


if (isset($_SESSION["user_id"])) {
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "onlinestore";

  $name = '';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM profile WHERE user_id = '$_SESSION[user_id]'";

  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {

    $name = $row["username"];

  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/images/iconS.png">
  <link rel="stylesheet" href="css/style.css">
  <title>Home</title>
</head>

<body class="fadeInPage">

<a id="goToTop" style="background-color: white; height: 70px; width: 70px; display: none; justify-content: center; align-items: center; border-radius: 50%; position: fixed; bottom: 15px; right: 15px; z-index: 100; border: 1px solid gray; text-decoration: none;" href="#">TOP</a>
  

  <nav class="navigationbar">
    <!-- LOGO -->
    <div class="logo"><a href="#">GIZMOVERSE</a></div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li><a href="#">Home</a></li>
        <li><a href="#about">About Us</a></li>

        <li>
          <a href="pages/products.php">Shop</a>
        </li>

        <li><a href="pages/customercare.php">Contact</a></li>
        <li><a
            href="<?php
            if (!isset($_SESSION['user_id'])) {
              echo htmlspecialchars("pages/login.php");
            } else {
              if ($_SESSION['role'] == "admin" ) {
                echo htmlspecialchars("pages/admin/admin.php");
              } else {
                echo htmlspecialchars("pages/profile.php");
              }
            } ?>">
            <?php if (!isset($_SESSION['user_id'])) {
              echo htmlspecialchars("Log In");
            } else {
              echo htmlspecialchars("Profile");
            } ?>
          </a></li>
      </div>
    </ul>
  </nav>


  <div class="bodyholder">

    <div class="spotlight-holder">

      <div class="spotlight-dark" style="background-image: url('assets/Images/1-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext bottomTitle">
            <h4><?php if(!isset($_SESSION["user_id"])){echo htmlspecialchars("GIZMOVERSE");}else{echo htmlspecialchars("Welcome ".$name);} ?></h4>
            <h1>Where your gadgets align with<br>the universe</h1>
          </div>
        </div>
      </div>

      <div class="spotlight-light" style="background-image: url('assets/Images/1-light.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext bottomTitle">
          <h4><?php if(!isset($_SESSION["user_id"])){echo htmlspecialchars("GIZMOVERSE");}else{echo htmlspecialchars("Welcome ".$name);} ?></h4>
            <h1>Where your gadgets align with<br>your heart</h1>
          </div>
        </div>
      </div>

    </div>

    <div class="spotlight-holder section">
      
      <div class="spotlight-dark" style="background-image: url('assets/Images/2-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext rightTitle">
            <h4>GIZMOVERSE</h4>
            <h1>Unleash your creativity<br>with us</h1>
          </div>
        </div>
      </div>
      
      <div class="spotlight-light" style="background-image: url('assets/Images/2-light.png');">
        <div class="overlaytextcontainer ">
          <div class="overlaytext invert rightTitle">
            <h4>GIZMOVERSE</h4>
            <h1>Unleash your creativity<br>with gizmoverse</h1>
          </div>
        </div>
      </div>
    
    </div>

    <div class="spotlight-holder section">
      
      <div class="spotlight-dark" style="background-image: url('assets/Images/6-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext leftTitle">
            <h4>GIZMOVERSE</h4>
            <h1>Amplify your dreams<br>with the cosmos</h1>
          </div>
        </div>
      </div>
      
      <div class="spotlight-light" style="background-image: url('assets/Images/6-light.png');">
        <div class="overlaytextcontainer ">
          <div class="overlaytext invert leftTitle">
            <h4>GIZMOVERSE</h4>
            <h1>Amplify your dreams<br>with gizmoverse</h1>
          </div>
        </div>
      </div>
    
    </div>

    <div class="spotlight-holder section">
      
      <div class="spotlight-dark" style="background-image: url('assets/Images/3-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext rightTitle">
            <h4>GIZMOVERSE</h4>
            <h1>WE MAKE THINGS<br>BETTER</h1>
          </div>
        </div>
      </div>
      
      <div class="spotlight-light" style="background-image: url('assets/Images/3-light.png');">
        <div class="overlaytextcontainer ">
          <div class="overlaytext rightTitle">
            <h4>GIZMOVERSE</h4>
            <h1>WE MAKE THINGS<br>PERFECT</h1>
          </div>
        </div>
      </div>
    
    </div>

    <div class="spotlight-holder section">
      
      <div class="spotlight-dark" style="background-image: url('assets/Images/4-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext centerTitle" style=" width:100%; display: flex; justify-content: center; align-items: center; height: 100vh;">
            
            <p style="width:70%; letter-spacing: 5px; line-height: 40px;" >Gizmoverse is rooted in a deep passion for technology, gaming, and artistic expression. As an artist and a game development student, the founder ignited an idea combining a love for gadgets with artistic creativity. The founder recognized the incredible potential of merging these two worlds. Gizmoverse is made as a platform not only to cater to tech enthusiasts but also to serve the vibrant gaming community.</p>
          
          </div>
        
  
        </div>
      </div>

      <div class="spotlight-light" style="background-image: url('assets/Images/4-light.png');">
        <div class="overlaytextcontainer">
          
          <div class="overlaytext invert centerTitle" style="width:100%; display: flex; justify-content: center; align-items: center; height: 100vh;">
            
            <p style="width:70%; letter-spacing: 5px; line-height: 40px;">Gizmoverse is rooted in a deep passion for technology, gaming, and artistic expression. As an artist and a game development student, the founder ignited an idea combining a love for gadgets with artistic creativity. The founder recognized the incredible potential of merging these two worlds. Gizmoverse is made as a platform not only to cater to tech enthusiasts but also to serve the vibrant gaming community.</p>
          
          </div>
        
        </div>
      </div>
    
    </div>

    <div class="spotlight-holder section" id="about">

      <div class="spotlight-dark" style="background-image: url('assets/Images/5-dark.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext centerTitle" style="padding-top: 30vh;">
            <h4>WORK WITH US</h4>
          </div>
          <div class="overlaytext centerTitle" style="bottom: 0; padding-bottom: 30vh;">
            <h4>SERIOUSLY</h4>
          </div>
        </div>
      </div>

      <div class="spotlight-light" style="background-image: url('assets/Images/5-light.png');">
        <div class="overlaytextcontainer">
          <div class="overlaytext invert centerTitle" style="padding-top: 30vh;">
            <h4>TO FIND OUT</h4>
          </div>
          <div class="overlaytext invert centerTitle" style="bottom: 0; padding-bottom: 30vh;">
            <h4>WE NEED MONEY</h4>
          </div>
        </div>
      </div>

    </div>

    <div class="footer">
      <p>- - - - - THIS IS A REQUIREMENT FOR EMC002 WEB PROGRAMMING</p>
      <p>THANK YOU - - - - -</p>
    </div>

  </div>


  <script type="text/javascript" src="js/script.js" id="rendered-js"></script>

</body>

</html>