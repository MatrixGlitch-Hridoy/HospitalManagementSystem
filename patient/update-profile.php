<?php include "../controls/db.php" ?>
<?php
  if(isset($_POST['submit']))
  {
    $uName = $_POST['username'];
    if(empty($uName)){
      $error_msg['username'] = "Name is required";
    }
    else if((strlen($uName)<6)){
      $error_msg['username'] = "Name is too short";
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$uName)){
      $error_msg['username'] = "Only letter allowed";
    }

    $email = $_POST['email'];
    if(empty($email)){
      $error_msg['email'] = "Email is required";
    }
    else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$email)) {
      $error_msg['email'] = "Invalid email format";
    }

    $address = $_POST['address'];
    if(empty($address)){
      $error_msg['address'] = "Address is required";
    }
    else if (!preg_match("/\d+ [0-9a-zA-Z ]+/",$address)) {
      $error_msg['address'] = "Invalid address format";
    }

    $phone = $_POST['phone'];
    if(empty($address)){
      $error_msg['phone'] = "Phone number is required";
    }
    else if(!is_numeric($phone)){
      $error_msg['phone'] = "Only number input";
    }
    else if((strlen($phone)!=11)){
      $error_msg['phone'] = "Invalid phone number format";
    }

    $gender = $_POST['gender'];
    if($gender=="NULL"){
      $error_msg['gender'] = "Gender in required";
    }


    $password = $_POST['password'];
    if(empty($password)){
      $error_msg['password'] = "Password is required";
    }
    else if((strlen($password)<6)){
      $error_msg['password'] = "Password is too short";
    }
    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
      $error_msg['password'] = "the password does not meet the requirements";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styling -->
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../css/admin-nav.css" />
    <link rel="stylesheet" href="../css/admin.css" />

    <title>Admin Section - Manage Admin</title>
  </head>

  <body>
    <header class="header-area">
      <div class="title">
        <h1>Hospital Management System</h1>
      </div>
      <div class="navigation">
        <nav class="menu">
          <ul>
            <li>
              <a href="#">Dashboard</a>
              <ul>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
      <!-- Left Sidebar -->
      <div class="left-sidebar">
        <ul>
          <li><a href="book-appointment.php">Book Apointment</a></li>
          <li><a href="appointment-history.php">Apointment History</a></li>
          <li><a href="update-profile.php">Update Profile</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Update Profile</h2>

          <form action="update-profile.php" method="post">
            <div>
              <label>Username</label>
              <input type="text" name="username" class="text-input" />
              <?php 
                if(isset($error_msg['username']))
                {
                  echo"<span class='error1'>".$error_msg['username']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Email</label>
              <input type="email" name="email" class="text-input" />
              <?php 
                if(isset($error_msg['email']))
                {
                  echo"<span class='error1'>".$error_msg['email']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Address</label>
              <input type="text" name="address" class="text-input" />
              <?php 
                if(isset($error_msg['address']))
                {
                  echo"<span class='error1'>".$error_msg['address']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" class="text-input" />
              <?php 
                if(isset($error_msg['phone']))
                {
                  echo"<span class='error1'>".$error_msg['phone']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Gender</label>
              <select name="gender" class="text-input">
                <option value="NULL">--Select Gender--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <?php 
                if(isset($error_msg['gender']))
                {
                  echo"<span class='error1'>".$error_msg['gender']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" class="text-input" />
              <?php 
                if(isset($error_msg['password']))
                {
                  echo"<span class='error1'>".$error_msg['password']."</span>";
                }
              ?>
            </div>
            <div>
              <button type="submit" name="submit" class="btn btn-big">Update</button>
            </div>
          </form>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
