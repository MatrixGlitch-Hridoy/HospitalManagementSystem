<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../doctor-login.php");
  }
  $currentUser=$_SESSION['id'];
  if(isset($_POST['update']))
  {
      $update=$db->updateSingleRecord($_POST,"doctors",$currentUser);
      if($update)
      {
          echo "<script>alert('Updated succesfully');</script>";
  
          echo "<script>window.location.href = 'update-profile.php';</script>";
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
              <a href="#"><?php echo $_SESSION['username'];?></a>
              <ul>
                <li><a href="../controls/logout.php">Logout</a></li>
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
          <li><a href="approve-appointment.php">Approve Apointment</a></li>
          <li><a href="appointment-history.php">Apointment History</a></li>
          <li><a href="update-profile.php?editid=<?php echo $currentUser; ?>">Update Profile</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Update Profile</h2>
          <!-- <?php include "../controls/errors.php"; ?> -->
            <?php  
              $data = $db->displaySingleRecord("doctors",$currentUser);
              if($data)
              {
                foreach($data as $value)
                {
            ?>
          <form action="update-profile.php" method="post" name="doctorform" onsubmit="return doctorvalidate()">
            <div>
              <label>Username</label>
              <input type="text" name="username" value="<?php echo $value['username']; ?>"  class="text-input" />
            </div>
            <div>
              <label>Email</label>
              <input type="email" name="email" value="<?php echo $value['email']; ?>" class="text-input" />
            </div>
            <div>
              <label>Update Specialization</label>
              <!-- <select name="DoctorSpecialization" class="text-input">
                <option value="NULL">--Select Specialization--</option>
                <option value="Neurology"
                <?php
                  if($value['specialization']=="Neurology")
                  {
                    echo "selected";
                  }
                ?>
                >Neurology</option>
                
                <option value="Pathology"
                <?php
                  if($value['specialization']=="Pathology")
                  {
                    echo "selected";
                  }
                ?>
                >Pathology</option>
                <option value="Pediatrics"
                <?php
                  if($value['specialization']=="Pediatrics")
                  {
                    echo "selected";
                  }
                ?>
                >Pediatrics</option>
              </select> -->
              <input type="text" name="DoctorSpecialization" class="text-input" value="<?php echo $value['specialization']; ?>">
            </div>
            <div>
              <label>Phone Number</label>
              <input type="text" name="phone" value="<?php echo $value['phone']; ?>" class="text-input" />
            </div>
            <div>
              <label>Gender</label>
              <select name="gender" class="text-input">
                <option value="NULL">-- Select Gender --</option>
                <option value="Male"
                <?php
                  if($value['gender']=="Male")
                  {
                    echo "selected";
                  }
                ?>
                >Male</option>
                <option value="Female"
                <?php
                  if($value['gender']=="Female")
                  {
                    echo "selected";
                  }
                ?>
                >Female</option>
              </select>
            </div>
            <div>
              <label>Password</label>
              <input type="text" name="password" value="<?php echo $value['password']; ?>" class="text-input" />
            </div>
            <div>
              <button type="submit" name="update" class="btn btn-big">Update</button>
            </div>
          </form>
          <?php } } ?>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <script src="../js/main.js"></script>
  </body>
</html>
