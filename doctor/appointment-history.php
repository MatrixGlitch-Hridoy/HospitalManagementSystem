<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/doctor-login.php");
  }
  $currentUser = $_SESSION['id'];
  if(isset($_POST['done']))
  {
    $update=$db->updateDoneStatus($_POST,"bookappoint");
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

    <title>Appointment History</title>
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
          <h2 class="page-title">Apointment History</h2>
          <input type="text" name="search" onkeyup="showmyuser()" class="search-bar search-input" id="uname" placeholder="Search">

          <table>
            <thead>
              <th>SN</th>
              <th>Patient Name</th>
              <th>Gender</th>
              <th>Symptoms</th>
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
          xhttp.open("GET", "/HospitalManagementSystem/doctor/load.php", true);
        
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
          xhttp.open("POST", "/HospitalManagementSystem/doctor/search.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("uname="+uname);
}

</script>
  </body>
</html>
