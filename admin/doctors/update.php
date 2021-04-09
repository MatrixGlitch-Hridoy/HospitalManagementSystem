<?php include "../../controls/Database.php" ?>
<?php
$db = new Database();
if(isset($_POST['update']))
{
  $update = $db->updateRecord($_POST,"doctors");
  if($update)
  {
    echo "<script>alert('Updated succesfully');</script>";
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
            $editid = $_REQUEST['editid'];
            $myrecord = $db->displayRecordById($editid,"doctors");
            include "../../controls/errors.php";
          ?>

          <form action="update.php" method="post">
            <div>
              <label>Username</label>
              <input type="text" name="username" value="<?php echo $myrecord['username']; ?>"  class="text-input" />
            </div>
            <div>
              <label>Email</label>
              <input type="email" name="email" value="<?php echo $myrecord['email']; ?>" class="text-input" readonly/>
            </div>
            <div>
              <label>Select Specialization</label>
              <select name="DoctorSpecialization" class="text-input">
                <option value="NULL">--Select Specialization--</option>
                <option value="Neurology"
                <?php
                  if($myrecord['specialization']=="Neurology")
                  {
                    echo "selected";
                  }
                ?>
                >Neurology</option>
                
                <option value="Pathology"
                <?php
                  if($myrecord['specialization']=="Pathology")
                  {
                    echo "selected";
                  }
                ?>
                >Pathology</option>
                <option value="Pediatrics"
                <?php
                  if($myrecord['specialization']=="Pediatrics")
                  {
                    echo "selected";
                  }
                ?>
                >Pediatrics</option>
              </select>
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" value="<?php echo $myrecord['phone']; ?>" class="text-input" />
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
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
