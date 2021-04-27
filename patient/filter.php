<?php include "../controls/Database.php" ?>

<?php 
  //session_start();
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../login.php");
  }
  // if(!isset($_SESSION['username']))
  // {
  //   header("Location:../login.php");
  // }

  

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
    <!-- <link rel="stylesheet" type="text/css" -->
        <!-- href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css" /> -->

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
        <div class="select-group">
          <div class="select1" >
            <label>Doctor Specialization</label>
            <select  class="selectbox" id="select_std">
            </select>
          </div>
          <div class="select2" >
            <label>Gender</label>
            <select  class="selectbox" id="select_res">
            </select>
          </div>
          
        </div>
        <div class="filter-group">
            <button class="btn btn-big" onclick="filter()">Filter</button>
            <button class="btn btn-big" onclick="location.reload()">Reset</button>
        </div>

        <div class="content">
          <h2 class="page-title">Book Appointment</h2>

          <table >
            <thead>
              <th>Sn</th>
              <th>Username</th>
              <!-- <th>Email</th> -->
              <th>Specialization</th>
              <th>Fees</th>
              <th>Gender</th>  
              <th>Date</th>  
              <th>Day</th>  
              <th>Start Time</th>  
              <th>End Time</th>  
              <th>Status</th>  
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="../js/jquery.min.js"></script>
  
    <script>
        function fetch_std(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("select_std").innerHTML = this.responseText;
            }
          else
          {
            document.getElementById("select_std").innerHTML = this.status;
          }
          };
          xhttp.open("GET", "/HospitalManagementSystem/patient/fetch_std.php", true);
        
          xhttp.send();
          
        }
        fetch_std()

      // Fetch Result
      function fetch_res() {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("select_res").innerHTML = this.responseText;
            }
          else
          {
            document.getElementById("select_res").innerHTML = this.status;
          }
          };
          xhttp.open("GET", "/HospitalManagementSystem/patient/fetch_res.php", true);
        
          xhttp.send();
    }
    fetch_res();


    function fetch(){
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
          xhttp.open("GET", "/HospitalManagementSystem/patient/load.php", true);
        
          xhttp.send();
          
        }
        fetch();

    function filter() {
          var spec=  document.getElementById("select_std").value;
          var gen=  document.getElementById("select_res").value;
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
          xhttp.open("POST", "/HospitalManagementSystem/patient/records.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("select_std="+spec + "&select_res="+gen);
}
    </script>
  </body>
</html>
