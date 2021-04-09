<?php include "../controls/db.php" ?>
<?php
  if(isset($_POST['submit']))
  {
    $doctorSpecialization = $_POST['doctorSpecialization'];
    if($doctorSpecialization=="NULL"){
      $error_msg['doctorSpecialization'] = "Doctor specialization required";
    }
    $doctorName = $_POST['doctorName'];
    if($doctorName=="NULL"){
      $error_msg['doctorName'] = "Doctor Name required";
    }
    $date = $_POST['date'];
    if(empty($date))
    {
      $error_msg['date'] = "Date required";
    }
    $time = $_POST['time'];
    if(empty($time))
    {
      $error_msg['time'] ="Time required";
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

    <title>Patient</title>
    <link rel="icon" href="../pic/hms.png">
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
          <h2 class="page-title">Book Appointment</h2>

          <form action="book-appointment.php" method="post">
          <div>
              <label>Doctor Specialization</label>
              <select name="doctorSpecialization" class="text-input">
                <option value="NULL">--Select Specialization--</option>
                <option value="Neurology">Neurology</option>
                <option value="Pathology">Pathology</option>
                <option value="Pediatrics">Pediatrics</option>
              </select>
              <?php 
                if(isset($error_msg['doctorSpecialization']))
                {
                  echo"<span class='error1'>".$error_msg['doctorSpecialization']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Doctor Name</label>
              <select name="doctorName" class="text-input">
                <option value="NULL">--Select Doctor--</option>
                <option value="Hridoy">Dr.Hridoy</option>
                <option value="Mahi">Dr.Mahi</option>
                <option value="Nabil">Dr.Nabil</option>
                <option value="fahad">Dr.Fahad</option>
              </select>
              <?php 
                if(isset($error_msg['doctorName']))
                {
                  echo"<span class='error1'>".$error_msg['doctorName']."</span>";
                }
              ?>
            </div>
            <div>
              <label>Date</label>
              <input type="date" name="date" class="text-input" />
            </div>
            <?php 
                if(isset($error_msg['date']))
                {
                  echo"<span class='error1'>".$error_msg['date']."</span>";
                }
              ?>
            <div>
              <label>Time</label>
              <input type="time" name="time" class="text-input" />
            </div>
            <?php 
                if(isset($error_msg['time']))
                {
                  echo"<span class='error1'>".$error_msg['time']."</span>";
                }
              ?>
            <div>
              <button type="submit" name="submit" class="btn btn-big">Book Appointment</button>
            </div>
          </form>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>
