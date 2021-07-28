<?php include "../controls/Database.php" ?>
<?php 
session_start();
  $db = new Database();
  if(isset($_POST['submit']))
  {
    $login = $db->loginRecord($_POST,"patients");
    if($login)
    {
      echo "<script>alert('Login succesful');</script>";
      echo "<script>window.location.href = 'user-home.php';</script>";
    }
    // else{
    //   echo "<script>alert('Database Empty!');</script>";
    //   echo "<script>window.location.href = 'login.php';</script>";
    // }
    // $email = $_POST['email'];
    // if(empty($email)){
    //   $error_msg['email'] = "Email is required";
    // }
    // else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$email)) {
    //   $error_msg['email'] = "Invalid email format";
    // }

    // $password = $_POST['password'];
    // if(empty($password)){
    //   $error_msg['password'] = "Password is required";
    // }
    // else if((strlen($password)<6)){
    //   $error_msg['password'] = "Password is too short";
    // }
    // else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
    //   $error_msg['password'] = "the password does not meet the requirements";
    // }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Patient Login</title>
    <link rel="icon" href="../images/hms.svg">
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1 class="head"><a href="../home.php">Hospital Management System</a> </h1>
      </div>
      <div class="navigation">
        <nav class="menu">
          <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Contact Us</a></li>
            <!-- <li>
              <a href="#">Login As></a>
              <ul>
                <li><a href="#">User</a></li>
                <li><a href="#">Doctor</a></li>
                <li><a href="#">Admin</a></li>
              </ul>
            </li> -->
          </ul>
        </nav>
      </div>
    </header>


    
<div class="auth-content">
<form action="login.php" method="post">
  <h2 class="form-title">Sign In</h2>
  <?php
    include "../controls/errors.php";
    
  ?>

  <!-- <div class="msg error">
    <li>Username required</li>
  </div> -->

  <div>
    <label>Email</label>
    <input type="text" name="email" class="text-input" > 
    <!-- value=" echo isset($_SESSION['email']) ? $_SESSION['email'] : '';" -->
    <?php 
      // if(isset($error_msg['email']))
      // {
      //   echo"<span class='error'>".$error_msg['email']."</span>";
      // }
    ?>
  </div>
  
  <div>
    <label>Password</label>
    <input type="password" name="password" class="text-input" >
    <?php 
      // if(isset($error_msg['password']))
      // {
      //   echo"<span class='error'>".$error_msg['password']."</span>";
      // }
    ?>
  </div>
 
  <div>
    <button type="submit" name="submit" class="btn btn-big">Login</button>
  </div>
  <p>Not a member? <a href="register.php">Sign Up</a></p>
</form>

</div>
<?php //session_unset(); ?>
   
</body>
</html>
