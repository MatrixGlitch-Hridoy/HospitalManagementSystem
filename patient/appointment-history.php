<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../login.php");
  }
  $currentUser = $_SESSION['id'];
  $data = $db->displayAppointment("bookappoint",$currentUser);
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
          <h2 class="page-title">Apointment History</h2>

          <table>
            <thead>
              <th>SN</th>
              <th>Doctor Name</th>
              <th>Specialization</th>
              <th>Fees</th>
              <th>Date</th>
              <th>Day</th>
              <th>Status</th>
              <th>Comment</th>
              <th colspan="2"class="th-action">Action</th>
            </thead>
            <tbody>
            <?php
              $sno=1;
              if($data){
              foreach($data as $value)
              {
            ?>
              <tr>
                <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['specialization'] ?></td>
                <td><?php echo $value['fees'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['day'] ?></td>
                <td class="status"><?php echo $value['status'] ?></td>
                <td class="status"><?php echo $value['comment']?></td>
                <td>
                  <?php
                    if($value['status']=='Pending'){
                  
                print '<a href="delete.php?deleteid='. $value['id'].' " class="delete btn-delete btn-big">Delete</a>'; }
                else{
                  print '<a class="btn-delete btn-big disabled-link">Delete</a>';
              } ?></td>
                <td><a href="invoice.php?printid=<?php echo $value['id']; ?>" class="btn-update btn-big">Print</a></td>
              </tr>
              <?php } }
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
  </body>
</html>
