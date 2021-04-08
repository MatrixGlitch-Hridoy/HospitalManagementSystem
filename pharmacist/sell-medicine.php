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
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="./style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../css/admin-nav.css" />

    <link rel="stylesheet" href="../css/admin.css" />

    <link rel="stylesheet" href="pharmacist.css">

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
                <h2 class="page-title">Sell Medicine</h2>

                <div class="search-btn">
                    <div>
                        <input type="text" class="text-inputMedium" placeholder="Search medicine...">
                    </div>

                    <div>
                        <button name="search" class="btn btn-big search">Search</button>
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>Paracitamol</td>
                        <td>
                            
                                <span onclick="decrease()" class="minus">-</span>
                                <input type="text" value="1" id="product" class="searchinput" />
                                <span onclick="increase()" class="plus">+</span>
                            

                        </td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td> <a href="checkout.php" class="btn btn-big">Continue</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
</body>

</html>

<!-- javascript plus minus -->

<script>

document.getElementById("product").readOnly = true;
function increase() {

    quan = document.getElementById("product").value;
    var a = parseInt(quan)

    document.getElementById("product").value = a + 1;
}

function decrease() {

    

    quan = document.getElementById("product").value;
    var a = parseInt(quan)
    document.getElementById("product").value = a - 1;
    a--
    
    if(a<=1){
        
        document.getElementById("product").value =  1;
    }
    
   


}
</script>