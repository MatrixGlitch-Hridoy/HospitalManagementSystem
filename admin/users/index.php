<?php include "../../controls/Database.php" ?>

<?php 
  //session_start();
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../../admin-login.php");
  }
  // if(!isset($_SESSION['username']))
  // {
  //   header("Location:../login.php");
  // }

  $data = $db->displayRecord("patients");
 
  

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
          <li><a href="index.php">Manage Patient</a></li>
          <li><a href="../doctors/index.php">Manage Doctor</a></li>
          <li><a href="../pharmacist/index.php">Manage Pharmacist</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add Patient</a>
          <a href="index.php" class="btn btn-big">Manage Patient</a>
        </div>
        <input type="text" name="search" class="search-bar search-input" id="search-text" placeholder="Search">

        <div class="content">
          <h2 class="page-title">Manage Patient</h2>

          <table id="table-data">
            <thead>
              <th>SN</th>
              <th>Username</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Address</th>
              <th colspan="2" class="th-action">Action</th>
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
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><a href="update.php?editid=<?php echo $value['id']; ?>" class="edit btn-update btn-big ">edit</a></td>
                <td><a href="delete.php?deleteid=<?php echo $value['id']; ?>" class="delete btn-delete btn-big">delete</a></td>
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
    <!-- <script src="../../js/jquery.min.js"></script> -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(fuction(){
        // $("#search-text").keyup(function(){
        //   var search = $(this).val();
        //   $.ajax({
        //     url:'index.php',
        //     method:'post',
        //     data:{query:search},
        //     success:function(response){
        //       $("#table-data").html(response);
        //     }
        //   });
        // });
        $.ajax()
      });
    </script>
  </body>
</html>
