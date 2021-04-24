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

    <!-- Custom Styling -->
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../css/admin-nav.css" />
    <link rel="stylesheet" href="../css/admin.css" />
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
                <a><i class="fas fa-shopping-cart"></i><span class="badge" id="cart_item"><?php echo $count ?></span></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper1">
      <!-- Left Sidebar -->
      <!-- <div class="left-sidebar">
        <ul>
          <li><a href="../users/index.php">Manage Patient</a></li>
          <li><a href="../doctors/index.php">Manage Doctor</a></li>
          <li><a href="index.php">Manage Pharmacist</a></li>
        </ul>
      </div> -->
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">My Cart</h2>

          <table>
            <thead>
              <th>SN</th>
              <th>Med Name</th>
              <th>Generic</th>
              <th>Med Type</th>
              <th>Med Image</th>
              <th>Med Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th colspan="2">Action</th>
            </thead>
            <tbody>
            <?php
              if(isset($_SESSION['cart']))
              {
              foreach($_SESSION['cart'] as $key=>$value)
              {
                $sn=$key+1;
            ?>
            <!-- //     echo"
            //     <tr>
            //     <td>$sn</td>
            //     <td>$value[mname]</td>
            //     <td>$value[mprice]</td>
            //     <td><input type='number' value='$value[Quantity]' min='1' max='10'></td>
            //     <td><button class='btn-delete'>Remove</button></td>
            //   </tr>"; -->
            <tr>
                <td><?php echo $sn?></td>
                <td><?php echo $value['mname'] ?></td>
                <td><?php echo $value['generic'] ?></td>
                <td><?php echo $value['mtype'] ?></td>
                <td><img src="<?php echo $value['image'] ?>" alt="image" height="100px" width="100px" ></td>
                <td><?php echo $value['mprice'] ?><input type="hidden" class="iprice" value="<?php echo $value['mprice']?>"></td>
                <td>
                    <input class="iquantity" onchange='subTotal()' type='number' value="<?php echo $value["Quantity"] ?>" min="1" max="1000">
                </td>
                <td class="itotal"></td>
                <td>
                    <form action="action.php" method="post">
                    <button class='btn-delete' name="remove">Remove</button>
                    <input type="hidden" name="mname" value="<?php echo $value["mname"] ?>">
                    </form>
                </td>
              </tr>
            <?php
              }
            }
            ?>
              

            </tbody>
          </table>
        </div>
      </div>
      <!--  Right Content -->
      <div class="right-sidebar">
          <div class="total-side">
            <h3>Grand Total</h3>
            <h5 id="gtotal"></h5>
            <?php
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
            {
            ?>
            <form action="purchase.php" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" readonly class="text-input" value="<?php echo $_SESSION['username'];//echo $myrecord['username']; ?>" />
   
                </div>
                <div>
                        <label>Email</label>
                        <input type="email" name="email" class="text-input" readonly value="<?php echo $_SESSION['email'];//echo $myrecord['email']; ?>" />
                </div>
                <div>
                        <label>Address</label>
                        <input type="text" name="address" class="text-input" value="<?php echo $_SESSION['address']; //echo $myrecord['address']; ?>" />

                </div>
                <div>
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="text-input" value="<?php echo $_SESSION['phone']; //echo $myrecord['phone']; ?>" />
                </div>
                <input style="display:inline-block;" type="radio" id="cod" name="payment" value="Cash on delivery">
                <label for="cod">Cash on delivery</label><br>
                <button class="btn-update" name="purchase">Make Purchase</button>
            </form> 
            <?php } ?>
          </div>
            
      </div>
      <!-- //Right content -->
    </div>
    <!-- // Page Wrapper -->
    <script>
        var gt=0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');
        function subTotal()
        {
            gt=0
            for(i=0;i<iprice.length;i++)
            {
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);   
                gt=gt+(iprice[i].value)*(iquantity[i].value);     
                
            }
            gtotal.innerText=gt;
        }
        subTotal();
    </script>
  </body>
</html>
