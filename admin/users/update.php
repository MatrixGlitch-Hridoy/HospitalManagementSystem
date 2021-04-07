<?php include"../../controls/Database.php" ?>
<?php
$db = new Database();
if(isset($_POST['update']))
{
    $db->updateRecord($_POST,"patients");
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
          <li><a href="index.php">Manage Patient</a></li>
          <li><a href="../doctors/index.php">Manage Doctor</a></li>
          <li><a href="../pharmacist/index.php">Manage Pharmacist</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Update Profile</h2>

        <?php
          
          // if(isset($_GET['editid']))
          //   {
          //       $editid = $_GET['editid'];
          //       $myrecord = $db->displayRecordById($editid,"patients");
           $editid = $_REQUEST['editid'];
           $myrecord = $db->displayRecordById($editid,"patients");
          //  var_dump($myrecord);           
            ?>
            <form action="update.php" method="post">
            <div>
              <label>Username</label>
              <input type="text" name="username" value="<?php echo $myrecord['username']; ?>" class="text-input" />
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" value="<?php echo $myrecord['email']; ?>" class="text-input" />
            </div>
            <div>
              <label>Address</label>
              <input type="text" name="address" value="<?php echo $myrecord['address']; ?>" class="text-input" />
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" value="<?php echo $myrecord['phone']; ?>" class="text-input" />
            </div>
            <div>
              <label>Gender</label>
              <select name="gender" class="text-input">
                <option value="<?php echo $myrecord['gender']; ?>">--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" value="<?php echo $myrecord['password']; ?>" class="text-input" />
            </div>
            <div>
                <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>">
              <button type="submit" name="update" class="btn btn-big">Update</button>
            </div>
          </form>
        <?php  
        
              
            //}
            // else{
            //     header("Location:index.php");
            // }
        ?>
          
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
