<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/doctor-login.php");
  }
  $currentUser = $_SESSION['id'];
  

  if(isset($_POST['approve']))
  {
    $update=$db->updateApprovedStatus($_POST,"bookappoint");
  }
  if(isset($_POST['decline']))
  {
    $update=$db->updateDeclineStatus($_POST,"bookappoint");
  }
  $data = $db->displayApproved($currentUser);
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

    <title>Approve Appointment</title>
    <link rel="icon" href="../images/hms.svg">
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
          <li><a href="update-profile.php">Update Profile</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
         <div class="content">
          <h2 class="page-title">Approve Apointment</h2>

          <table>
            <thead>
              <th>SN</th>
              <th>Patient Name</th>
              <th>Gender</th>
              <th>Date</th>
              <th>Symptoms</th>
              <th>Status</th>
              <th>Comment</th>
              <th colspan="2" class="th-action">Action</th>
            </thead>
            <tbody>
            <?php
              $sno=1;
              if($data){
              foreach($data as $value)
              {
                if($value['status']=='Pending')
                {
            ?>
              <tr>
                <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['reason'] ?></td>
                <?php
                if($value['status']=='Approved')
                { ?>
                <td class="status-1"><?php echo $value['status'] ?></td>
               <?php } else{?>
                <td class="status-2"><?php echo $value['status'] ?></td>
                <?php } ?>
                <td> <form action="" method="post"> <textarea name="comment" class="textarea" ></textarea> </td>
                <input type="hidden" name="id" value="<?php echo $value['id'];?>">
                <td>
                  <?php
                  if($value['status']=='Pending'){
                    print '<button type="submit" name="approve" class="approve btn-update btn-big">Approve</button>';}
                    else{
                      print '<button type="submit" name="approve" class="approve-link btn-update btn-big">Approve</button>';
                    }?>
                </td>
                <td>
                  <?php
                  if($value['status']=='Pending'){
                    print '<button type="submit" name="decline" class="decline btn-delete btn-big">Decline</button>';}
                    else{
                      print '<button type="submit" name="decline" class="decline-link btn-delete btn-big">Decline</button>';
                    }
                  ?>
                </td>
                </form>
              </tr>
              <?php } } }
              else{
              ?>
              <tr>
                <td colspan="8" class="no-record">No records found</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <script src="../js/main.js"></script>
  </body>
</html>
