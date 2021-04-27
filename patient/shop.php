<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/login.php");
  }
  $data = $db->displayRecord("medicine");
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
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>

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
            <li>
                <?php
                    $count=0;
                    if(isset($_SESSION['cart']))
                    {
                        $count = count($_SESSION['cart']);
                    }
                ?>
                <a href="mycart.php"><i class="fas fa-shopping-cart"></i><span class="badge" id="cart_item"><?php echo $count ?></span></a>
            </li>
            <li><a href="#">Checkout</a></li>
            
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
          <li><a href="shop.php">Medicine Shop</a></li>
          <li><a href="update-profile.php?editid=<?php echo $uid; ?>">Update Profile</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <!-- <div class="admin-content">
        <div class="content">

          <h2 class="page-title">Welcome To Your Dashboard <?php echo $_SESSION['username'];?></h2>
        </div>
      </div> -->
      <!-- // Admin Content -->

      <!-- caaaaaaaaard -->
      <div id="message"></div>
      <div class="row">
            <?php
                if($data)
                {
                    foreach($data as $value)
                    {
            ?>
            <div class="profile-card">
                <form action="action.php" method="post">
                <div class="profile-content">
                    <div class="profile-image">
                        <img src="<?php echo $value['image'] ?>" alt="image" height="100px" width="100px" >
                    </div>
                    <div class="desc">
                        <h2><?php echo $value['mName'] ?></h2>
                        <p>Generic: <?php echo $value['generic'] ?><br>Type: <?php echo $value['mType'] ?><br>Price: <?php echo $value['unitPrice'] ?> Taka</p>
                    </div>
                    <div class="btn-div">
                        <button class="btn-cart" name="Add_To_Cart"><i class="fas fa-shopping-cart" style="padding-right: 10px;"></i>Add to cart</button>  
                        <input type="hidden" name="mname" value="<?php echo $value['mName'] ?>">
                        <input type="hidden" name="mprice" value="<?php echo $value['unitPrice'] ?>">
                        <input type="hidden" name="generic" value="<?php echo $value['generic'] ?>">
                        <input type="hidden" name="mtype" value="<?php echo $value['mType'] ?>">
                        <input type="hidden" name="image" value="<?php echo $value['image'] ?>">
                    </div>
                </div>
                </form>
            </div>   
            <?php } } ?>
        </div>
    </div>
    <!-- // Page Wrapper -->
    <!-- <script src="../js/jquery.min.js"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
     
    </script>
  </body>
</html>
