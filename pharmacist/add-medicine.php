<?php include "../controls/Database.php" ?>


<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../pharmacist-login.php");
  }
  if(isset($_POST['submit'])){
    $create = $db->addMedicine($_POST,"medicine");
      if($create)
      {
        echo "<script>alert('Medicine Added succesfully');</script>";
        echo "<script>window.location.href = 'show-medicine.php';</script>";
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
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Custom Styling -->
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../css/admin-nav.css" />
    <link rel="stylesheet" href="../css/admin.css" />

    <title>Add Medicine</title>
    <link rel="icon" href="../pic/hms.png">
</head>

<body>
<header class="header-area">
        <div class="title">
            <h1 >Hospital Management System</h1>
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
    <?php $uid=$_SESSION['id']; ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <ul>

                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="add-medicine.php">Add Medicine</a></li>
                <li><a href="sell-medicine.php">Sell Medicine</a></li>
                <li><a href="show-medicine.php">Show Medicine</a></li>
                <li><a href="update-profile.php?editid=<?php echo $uid; ?>">Update Profile</a></li>
            </ul>
        </div>
        <!-- // Left Sidebar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="content">
                <h2 class="page-title">Add Medicine</h2>
 <?php include "../controls/errors.php"?>
                <form action="" method="post">
                    <div>
                        <label>Medicine Name</label>
                        <input type="text" name="mName" class="text-input" />
                        
                    </div>
                    <div>
                        <label>Generic</label>
                        <input type="generic" name="generic" class="text-input" />
                        
                    </div>
                    <div>
                        <label>Type</label>
                        <input type="type" name="mType" class="text-input" />
                        
                    </div>
                    <div>
                        <label>Quantity</label>
                        <input type="quantity" name="quantity" class="text-input" />
                        
                    </div>

                    <div>
                        <label>Unit Price</label>
                        <input type="unitPrice" name="unitPrice" class="text-input" />
                        
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-big">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
</body>

</html>