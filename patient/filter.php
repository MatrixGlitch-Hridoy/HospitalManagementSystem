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
            <select name="" class="selectbox" id="select_std">
                <option value="">Select</option>
            </select>
          </div>
          <div class="select2" >
            <label>Gender</label>
            <select name="" class="selectbox" id="select_res">
                <option value="">Select</option>
            </select>
          </div>
          
        </div>
        <div class="filter-group">
            <a href="" class="btn btn-big" id="filter">Filter</a>
            <a href="" class="btn btn-big" id="reset">Reset</a>
        </div>

        <div class="content">
          <h2 class="page-title">Book Appointment</h2>

          <table >
            <thead>
              <!-- <th>SN</th> -->
              <th>Username</th>
              <th>Email</th>
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
            <tbody id="record_table">
              
            </tbody>
          </table>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="../js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script> -->
  
    <script>
        // Fetch Standard
    function fetch_std() {
        $.ajax({
            url: "fetch_std.php",
            type: "post",
            dataType: "json",
            success: function(data) {
                var stdBody = "";
                for (var key in data) {
                    stdBody += `<option value="${data[key]['specialization']}">${data[key]['specialization']}</option>`;
                }
                $("#select_std").append(stdBody);
                console.log(data);
            }
        });
    }
    fetch_std();

      // Fetch Result
      function fetch_res() {
        $.ajax({
            url: "fetch_res.php",
            type: "post",
            dataType: "json",
            success: function(data) {
                var resBody = "";
                for (var key in data) {
                    resBody += `<option value="${data[key]['gender']}">${data[key]['gender']}</option>`;
                }
                $("#select_res").append(resBody);
                console.log(data);
            }
        });
    }
    fetch_res();

     // Fetch Records
     function fetch(std, res) {
        $.ajax({
            url: "records.php",
            type: "post",
            data: {
                std: std,
                res: res
            },
            dataType: "json",
            success: function(data) {
              $.each(data,function(key,value){
                //console.log(value['username']);
                $.sn = 1;
                $('#record_table').append(
                  '<tr>'+
                 
                  '<td>'+value['username']+'</td>\
                  <td>'+value['email']+'</td>\
                  <td>'+value['specialization']+'</td>\
                  <td>'+value['fees']+'</td>\
                  <td>'+value['gender']+'</td>\
                  <td>'+value['date']+'</td>\
                  <td>'+value['day']+'</td>\
                  <td>'+value['stime']+'</td>\
                  <td>'+value['etime']+'</td>\
                  <td class="status">'+value['status']+'</td>\
                  <td>\
                  <a href="book-appointment.php?bookid='+value['id']+'" class="delete btn-delete btn-big">Book</a>\
                  </td>\
                </tr>');
              });
            }
        });
    }
    fetch();

      // Filter
      $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        var std = $("#select_std").val();
        var res = $("#select_res").val();
        if (std !== "" && res !== "") {
            $('#record_table').empty();
            fetch(std, res);
        } else if (std !== "" && res == "") {
            $('#record_table').empty();
            fetch(std, '');
        } else if (std == "" && res !== "") {
            $('#record_table').empty();
            fetch('', res);
        } else {
            $('#record_table').empty();
            fetch();
        }
    });
    </script>
  </body>
</html>
