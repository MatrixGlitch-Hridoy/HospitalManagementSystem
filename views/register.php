<?php include "../controls/Database.php" ?>
<?php

$db = new Database();
  // $users = new Users();
  if(isset($_POST['submit'])){
  $create = $db->insertRecord($_POST,"patients");
    if($create)
    {
      echo "<script>alert('Registration succesfull');</script>";
      echo "<script>window.location.href = 'login.php';</script>";
    }
    // else{
    //   echo "<script>alert('Something went wrong.Please try again');</script>";
    //   echo "<script>window.location.href = 'login.php';</script>";
    // }
    // $_SESSION['email'] = $_POST['email'];
    // $_SESSION['password'] = $_POST['password'];
    // header("Location:login.php");
  //   // $users->userRegistration($_POST);
  //   $uName = $_POST['username'];
  //   $email = $_POST['email'];
  //   $password = $_POST['password'];
  //   $cpassword = $_POST['passwordConf'];
    
  //   if(empty($uName)||empty($email)||empty($password)||empty($cpassword))
  //   {
  //     $error_msg = "Fields must not be empty";
  //   }
  //   else if((strlen($uName)<4))
  //   {
  //     $error_msg = "username must be atleat 4 character";
 
  //   }
  //   else if(!preg_match("/^[a-zA-Z ]*$/",$uName))
  //   {
  //     $error_msg = "Only letter allowed";
  //   }
  //   else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$email))
  //   {
  //     $error_msg = "Invalid email format";
  //   }
  //   else if((strlen($password)<6))
  //   {
  //     $error_msg = "Password must be atleat 6 character";
  //   }
  //   else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password))
  //   {
  //     $error_msg= "the password does not meet the requirements";
  //   }
  //   else if(!($cpassword==$password))
  //   {
  //     $error_msg= "Re-Check your password";
  //   }
  //   else{
  //     $sql = "INSERT INTO patients(username,email,password) VALUES('$uName','$email','$password')";
  //     $create = $db->insert($sql);
  //   }











    //$uName = $_POST['username'];
    // if(empty($uName)){
    //   $error_msg['username'] = "Name is required";
    // }
    // if(!(empty($uName))&&(strlen($uName)<4)){
    //   $error_msg['username'] = "Name is too short";
    // }
    // if(!((empty($uName))&&(strlen($uName)<4))&&(!preg_match("/^[a-zA-Z ]*$/",$uName))){
    //   $error_msg['username'] = "Only letter allowed";
    // }

    // //$email = $_POST['email'];
    // if(empty($email)){
    //   $error_msg['email'] = "Email is required";
    // }
    // if (!(empty($uName))&&(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$email))) {
    //   $error_msg['email'] = "Invalid email format";
    //   }

    // //$password = $_POST['password'];
    // if(empty($password)){
    //   $error_msg['password'] = "Password is required";
    // }
    // if(!(empty($uName))&&(strlen($password)<6)){
    //   $error_msg['password'] = "Password is too short";
      
    // }
    // if(!((empty($uName))&&(strlen($password)<6))&&(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password))){
    //   $error_msg['password'] = "the password does not meet the requirements";
    // }
  
    // //$cpassword = $_POST['passwordConf'];
    // if(empty($cpassword)){
    //   $error_msg['passwordConf'] = "Confirm Password is required";
    // }
    // if(!($cpassword==$password) )
    // {
    //   $error_msg['passwordConf'] = "Re-Check your password";
    // }
      
      
    // if($db->query($sql)==TRUE){
    //   echo "inserted";
    // }
    // else{
    //   echo "failed";
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
    <title>Registration</title>
    <link rel="icon" href="../images/hms.svg">
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1 class="head"><a href="../home.php">Hospital Management System</a> </h1>
      </div>
      <!-- <nav class="navbar">
        <ul class="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Service</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </nav> -->
      <div class="navigation">
        <nav class="menu">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Contact Us</a></li>
            <!-- <li>
              <a href="#">Login</a>
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

 <form action="register.php" method="post">
  <h2 class="form-title">Register</h2>
  <?php 
    // if(isset($error_msg))
    //    {
    //      echo"<span class='error'>".$error_msg."</span>";
    //     //  echo"<span class='error'>".$error_msg['username']."</span>";
    //    }
    include "../controls/errors.php";
    $db = new Database();
  ?>
  <?php
    // if(isset($_GET['msg']))
    // {
    //   echo"<span class='error'>".$_GET['msg']."</span>";
    // }
  ?>
  <!-- <div class="msg error">
    <li>Username required</li>
  </div> -->

  <div>
    <label>Username</label>
    <input type="text" name="username" class="text-input" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>"> <!-- Keep field values after refresh -->
    <?php 
      // if(isset($error_msg['username']))
      // {
      //   echo"<span class='error'>".$error_msg['username']."</span>";
      // }
    ?>
    
  </div>
  <div>
    <label>Email</label>
    <input type="text" name="email" class="text-input" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
    <?php 
      // if(isset($error_msg['email']))
      // {
      //   echo"<span class='error'>".$error_msg['email']."</span>";
      // }
    ?>
  </div>
  <div>
    <label>Password</label>
    <input type="password" name="password" class="text-input">
    <?php 
      // if(isset($error_msg['password']))
      // {
      //   echo"<span class='error'>".$error_msg['password']."</span>";
      // }
    ?>
  </div>
  <div>
    <label>Password Confirmation</label>
    <input type="password" name="passwordConf" class="text-input">
    <?php 
      // if(isset($error_msg['passwordConf']))
      // {
      //   echo"<span class='error'>".$error_msg['passwordConf']."</span>";
      // }
    ?>
  </div>
  <div>
    <button type="submit" name="submit" class="btn btn-big">Register</button>
  </div>
  <p>Already a member? <a href="login.php">Sign In</a></p>
</form>

</div>
   
  </body>
</html>
