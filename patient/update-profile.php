<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../login.php");
  }
  if(isset($_POST['update']))
{
  $update = $db->updateRecord($_POST,"patients");
  if($update)
  {
    echo "<script>alert('Updated succesfully');</script>";
    echo "<script>window.location.href = 'dashboard.php';</script>";
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
              <a href="dashboard.php"><?php echo $_SESSION['username'];?></a>
              <ul>
                <li><a href="../controls/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <?php $uid = $_SESSION['id']; ?>
    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
      <!-- Left Sidebar -->
      <div class="left-sidebar">
        <ul>
          <li><a href="filter.php">Book Apointment</a></li>
          <li><a href="appointment-history.php">Apointment History</a></li>
          <li><a href="update-profile.php?editid=<?php echo $uid; ?>">Update Profile</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Update Profile</h2>
            <?php 
              $editid = $_REQUEST['editid'];
              $myrecord = $db->displayRecordById($editid,"patients");
              //print_r($myrecord);
              include "../controls/errors.php";
            ?>
          <form action="update-profile.php" method="post">
            <div>
              <label>Username</label>
              <input type="text" name="username" class="text-input" value="<?php echo $myrecord['username']; ?>"/>
              <?php 
                // if(isset($error_msg['username']))
                // {
                //   echo"<span class='error1'>".$error_msg['username']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" class="text-input" value="<?php echo $myrecord['email']; ?>" readonly/>
              <?php 
                // if(isset($error_msg['email']))
                // {
                //   echo"<span class='error1'>".$error_msg['email']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Address</label>
              <input type="text" name="address" class="text-input" value="<?php echo $myrecord['address']; ?>"/>
              <?php 
                // if(isset($error_msg['address']))
                // {
                //   echo"<span class='error1'>".$error_msg['address']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" class="text-input" value="<?php echo $myrecord['phone']; ?>"/>
              <?php 
                // if(isset($error_msg['phone']))
                // {
                //   echo"<span class='error1'>".$error_msg['phone']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Gender</label>
              <select name="gender" class="text-input">
                <option value="NULL">-- Select Gender --</option>
                <option value="Male"
                <?php
                  if($myrecord['gender']=="Male")
                  {
                    echo "selected";
                  }
                ?>
                >Male</option>
                <option value="Female"
                <?php
                  if($myrecord['gender']=="Female")
                  {
                    echo "selected";
                  }
                ?>
                >Female</option>
              </select>
              <?php 
                // if(isset($error_msg['gender']))
                // {
                //   echo"<span class='error1'>".$error_msg['gender']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" class="text-input" value="<?php echo $myrecord['password']; ?>"/>
              <?php 
                // if(isset($error_msg['password']))
                // {
                //   echo"<span class='error1'>".$error_msg['password']."</span>";
                // }
              ?>
            </div>
            <div>
              <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>">
              <button type="submit" name="update" class="btn btn-big">Update</button>
            </div>
          </form>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
