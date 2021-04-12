<?php include "../../controls/Database.php" ?>
<?php
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../../admin-login.php");
  }
  if(isset($_POST['submit'])){
  $create = $db->insertRecord($_POST,"doctors");
    if($create)
    {
      echo "<script>alert('Doctor Added succesfully');</script>";
      echo "<script>window.location.href = 'index.php';</script>";
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
    <link rel="stylesheet" href="../../css/admin-nav.css" />
    <link rel="stylesheet" href="../../css/admin.css" />

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
              <a href="#"><?php echo $_SESSION['username'];?></a>
              <ul>
                <li><a href="../../controls/logout.php">Logout</a></li>
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
          <li><a href="../users/index.php">Manage Patient</a></li>
          <li><a href="index.php">Manage Doctor</a></li>
          <li><a href="../pharmacist/index.php">Manage Pharmacist</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add Doctor</a>
          <a href="index.php" class="btn btn-big">Manage Doctor</a>
        </div>

        <div class="content">
          <h2 class="page-title">Add Doctor</h2>
          <?php
            include "../../controls/errors.php";
            $db = new Database();
          ?>

          <form action="create.php" method="post">
            <div>
              <label>Username</label>
              <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>"  class="text-input" />
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>" class="text-input" />
            </div>
            <div>
              <label>Select Specialization</label>
              <select name="DoctorSpecialization" class="text-input">
                <option value="NULL">--Select Specialization--</option>
                <option value="Neurology">Neurology</option>
                <option value="Pathology">Pathology</option>
                <option value="Pediatrics">Pediatrics</option>
              </select>
            </div>
            <div>
              <label>Fees</label>
              <input type="text" name="fees" class="text-input" />
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" class="text-input" />
            </div>
            <div>
              <label>Gender</label>
              <select name="gender" class="text-input">
                <option value="NULL">--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" class="text-input" />
            </div>
            <div>
              <label>Password Confirmation</label>
              <input type="password" name="passwordConf" class="text-input" />
            </div>

            <div>
              <button type="submit" name="submit" class="btn btn-big">Add Doctor</button>
            </div>
          </form>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
