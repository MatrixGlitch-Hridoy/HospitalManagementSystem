<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/pharmacist-login.php");
  }

  if(isset($_POST['update']))
{
  $update = $db->updateMedicine($_POST,"medicine");
  if($update)
  {
    echo "<script>alert('Updated succesfully');</script>";
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

    <title>Update Medicine</title>
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
                <h2 class="page-title">Modify Medicine</h2>

          <?php 
          $editid = $_REQUEST['editid'];
           $myrecord = $db->displayRecordById($editid,"medicine");
           include "../controls/errors.php";
           ?>


                <form action="update-medicine.php" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="mName" class="text-input" readonly value="<?php echo $myrecord['mName']; ?>" />
                        
                    </div>
                    <div>
                        <label>Generic</label>
                        <input type="text" name="generic" class="text-input" readonly value="<?php echo $myrecord['generic']; ?>" />
                        
                    </div>
                    <div>
                        <label>Type</label>
                        <input type="text" name="mType" class="text-input" readonly value="<?php echo $myrecord['mType']; ?>" />
                        
                    </div>
                    <div>
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="text-input" value="<?php echo $myrecord['quantity']; ?>" />
                        
                    </div>

                    <div>
                        <label>Unit Price</label>
                        <input type="text" name="unitPrice" class="text-input" value="<?php echo $myrecord['unitPrice']; ?>" />
                        
                    </div>
                    <div>
                   
    
                    <input type="hidden" name="hid" value="<?php echo $myrecord['id']; ?>">

                        <button type="submit" name="update" class="btn btn-big">Update Medicine</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
</body>

</html>