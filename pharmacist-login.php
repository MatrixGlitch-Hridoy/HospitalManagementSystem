<?php include "controls/Database.php" ?>
<?php 
session_start();
$db = new Database();
  if(isset($_POST['submit']))
  {
    $login = $db->loginRecord($_POST,"pharmacists");
    if($login)
    {
      echo "<script>alert('Login succesful');</script>";
      echo "<script>window.location.href = 'pharmacist/dashboard.php';</script>";
    }
    // else{
    //   echo "<script>alert('Database Empty!');</script>";
    //   echo "<script>window.location.href = 'pharmacist-login.php';</script>";
    // }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1>Hospital Management System</h1>
      </div>
      <div class="navigation">
        <nav class="menu">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Contact Us</a></li>
            
          </ul>
        </nav>
      </div>
    </header>


    
  <div class="auth-content">

<form action="pharmacist-login.php" method="post">
  <h2 class="form-title">Sign In</h2>
  <?php
    include "controls/errors.php";  
  ?>

  <!-- <div class="msg error">
    <li>Username required</li>
  </div> -->

  <div>
    <label>Email</label>
    <input type="text" name="email" class="text-input">
  </div>
  
  <div>
    <label>Password</label>
    <input type="password" name="password" class="text-input">
  </div>
 
  <div>
    <button type="submit" name="submit" class="btn btn-big">Login</button>
  </div>

</form>

</div>
   
  </body>
</html>
