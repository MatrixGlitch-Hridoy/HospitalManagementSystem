<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/login.php");
  }

  $currentUser = $_SESSION['id'];
  if(isset($_POST['book']))
{
  $update = $db->bookAppointment($_POST,"bookappoint",$currentUser);
  if($update)
  {
    echo "<script>alert('Appointment Booked succesfully');</script>";
    echo "<script>window.location.href = 'appointment-history.php';</script>";
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
          <h2 class="page-title">Book Appointment</h2>

          <?php
            $editid = $_REQUEST['bookid'];
            $myrecord = $db->displayRecordById($editid,"doctors");
            include "../controls/errors.php";
          ?>

          <form action="" method="POST">
          <div>
              <?php
                // $sql = "SELECT DISTINCT specialization FROM doctors"; //distinct for remove duplicate
                // $result = $db->connection->query($sql);
              ?>
              <label>Doctor Specialization</label>
              <input type="text" name="specialization" value="<?php echo $myrecord['specialization']; ?>"  class="text-input" readonly/>
              <!-- <select name="DoctorSpecialization" class="text-input" id="ds"> -->
                <!-- <option value="NULL">--Select Specialization--</option> -->
                
                <?php
                  // while($row = $result->fetch_assoc())
                  // { ?>
                    <!-- <option value="<?php// echo $row['specialization'];?>"><?php // echo $row['specialization']?></option> -->
                  <?php
                  //}
                ?>

              <!-- </select> -->
              <?php 
                // if(isset($error_msg['doctorSpecialization']))
                // {
                //   echo"<span class='error1'>".$error_msg['doctorSpecialization']."</span>";
                // }
              ?>
            </div>
            <div>
              <label>Doctor Name</label>
              <!-- <select name="doctorName" class="text-input" >
                <option value="NULL">--Select Doctor--</option> -->
                <!-- <option value="Hridoy">Dr.Hridoy</option>
                <option value="Mahi">Dr.Mahi</option>
                <option value="Nabil">Dr.Nabil</option>
                <option value="fahad">Dr.Fahad</option> -->
              <!-- </select> -->
              <input type="text" name="username" value="<?php echo $myrecord['username']; ?>"  class="text-input" readonly/>
              <?php 
                // if(isset($error_msg['doctorName']))
                // {
                //   echo"<span class='error1'>".$error_msg['doctorName']."</span>";
                // }
              ?>
            </div>
            <div>
                  <label>Fees</label>
                  <input type="text" name="fees" value="<?php echo $myrecord['fees']; ?>"  class="text-input" readonly/>
            </div>
            <div>
              <label>Date</label>
              <input type="text" name="date" class="text-input" value="<?php echo $myrecord['date']; ?>" readonly/>
            </div>
            <?php 
                // if(isset($error_msg['date']))
                // {
                //   echo"<span class='error1'>".$error_msg['date']."</span>";
                // }
              ?>
            <div>
              <label>Day</label>
              <input type="text" name="day" class="text-input" value="<?php echo $myrecord['day']; ?>" readonly/>
            </div>
            <?php 
                // if(isset($error_msg['time']))
                // {
                //   echo"<span class='error1'>".$error_msg['time']."</span>";
                // }
              ?>
              <div>
                <label for="">Reason for Appointment</label>
                <textarea name="reason" id="" cols="30" rows="10" class="reasontext"></textarea>
              </div>
            <div>
              <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>">
              <button type="submit" name="book" class="btn btn-big">Book Appointment</button>
            </div>
          </form>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      // $(document).ready(function(){
      //   function loadData(type,catid)
      //   {
      //     $.ajax({
      //       url:"load.php",
      //       type:"POST",
      //       data:{type:type, id:catid},
      //       success:function(data)
      //       {
      //         if(type=="dname")
      //         {
      //           $("#dn").html(data);
      //         }
      //        else{
      //           $("#ds").append(data);
      //         }
              
      //       }
      //     });
      //   }
      //   loadData();

      //   $("#ds").on("change",function(){
      //     var ds = $("#ds"),val();
      //     loadData("dname",ds);
      //   })
      // });
    </script>
  </body>
</html>
