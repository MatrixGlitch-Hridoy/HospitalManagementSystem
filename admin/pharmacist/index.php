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

  $data = $db->displayRecord("pharmacists");
  

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
          <li><a href="../doctors/index.php">Manage Doctor</a></li>
          <li><a href="index.php">Manage Pharmacist</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="button-group">
          <a href="create.php" class="btn btn-big">Add Pharmacist</a>
          <a style="background:grey;pointer-events: none;" href="index.php" class="btn btn-big">Manage Pharmacist</a>
        </div>
        <input type="text" name="search" onkeyup="showmyuser()" class="search-bar search-input" id="uname" placeholder="Search">

        <div class="content">
          <h2 class="page-title">Manage Pharmacist</h2>

          <table>
            <thead>
              <th>SN</th>
              <th>Username</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Address</th>
              <th colspan="2" class="th-action">Action</th>
            </thead>
            <tbody id="table-data">
          
            </tbody>
          </table>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <script src="../../js/jquery.min.js"></script>
    <script>
       function MyAjaxFunc(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("table-data").innerHTML = this.responseText;
            }
          else
          {
            document.getElementById("table-data").innerHTML = this.status;
          }
          };
          xhttp.open("GET", "/HospitalManagementSystem/admin/pharmacist/load.php", true);
        
          xhttp.send();
          
        }
        MyAjaxFunc()

        function showmyuser() {
          var uname=  document.getElementById("uname").value;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("table-data").innerHTML = this.responseText;
            }
          else
          {
            document.getElementById("table-data").innerHTML = this.status;
          }
          };
          xhttp.open("POST", "/HospitalManagementSystem/admin/pharmacist/search.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("uname="+uname);
}
    </script>
  </body>
</html>
