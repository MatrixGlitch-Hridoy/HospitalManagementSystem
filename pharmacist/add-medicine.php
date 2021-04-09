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

    <title>Pharmacist</title>
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
                        <a href="#">Dashboard</a>
                        <ul>
                            <li><a href="#">Logout</a></li>
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

                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="add-medicine.php">Add Medicine</a></li>
                <li><a href="sell-medicine.php">Sell Medicine</a></li>
                <li><a href="update-medicine.php">Update Medicine</a></li>
            </ul>
        </div>
        <!-- // Left Sidebar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="content">
                <h2 class="page-title">Add Medicine</h2>

                <form action="" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" class="text-input" />
                        <?php 
                if(isset($error_msg['username']))
                {
                  echo"<span class='error1'>".$error_msg['username']."</span>";
                }
              ?>
                    </div>
                    <div>
                        <label>Generic</label>
                        <input type="email" name="email" class="text-input" />
                        <?php 
                if(isset($error_msg['email']))
                {
                  echo"<span class='error1'>".$error_msg['email']."</span>";
                }
              ?>
                    </div>
                    <div>
                        <label>Type</label>
                        <input type="text" name="address" class="text-input" />
                        <?php 
                if(isset($error_msg['address']))
                {
                  echo"<span class='error1'>".$error_msg['address']."</span>";
                }
              ?>
                    </div>
                    <div>
                        <label>Quantity</label>
                        <input type="text" name="phone" class="text-input" />
                        <?php 
                if(isset($error_msg['phone']))
                {
                  echo"<span class='error1'>".$error_msg['phone']."</span>";
                }
              ?>
                    </div>

                    <div>
                        <label>Unit Price</label>
                        <input type="password" name="password" class="text-input" />
                        <?php 
                if(isset($error_msg['password']))
                {
                  echo"<span class='error1'>".$error_msg['password']."</span>";
                }
              ?>
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