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
                <h2 class="page-title">Checkout</h2>

                <div class="checkcart">
                    <form action="" method="post">
                        <div>
                            <label>Customer Name</label>
                            <input type="text" name="name" id="cName" class="text-inputMedium" />

                        </div>
                        <div>
                            <label>Email</label>
                            <input type="text" name="email" id="cEmail" class="text-inputMedium" />

                        </div>
                        <div>
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" id="cMobile" class="text-inputMedium" />

                        </div>
                        <div>
                            <label>Address</label>
                            <input type="text" name="address" id="cAddress" class="text-inputMedium" />

                        </div>
                        <div>
                            <label>City</label>
                            <input type="text" name="phone" id="cCity" class="text-inputMedium" />

                        </div>

                        <div>
                            <input type="checkbox">Use address for shipping
                        </div>

                        <div>
                            <button type="submit" value="submit" onclick="myFunction()"
                                class="btn btn-big">Confirm</button>
                        </div>



                    </form>

                    <div class="cart">
                        <h4>Order summary</h4>
                        <p>Items ordered :</p>
                        <p>Product Price :</p>
                        <p>Shipping:</p>
                        <p>Tax + VAT :</p>
                        <hr>
                        <p><b>Total Price :</b></p>

                    </div>
                </div>


            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->


</body>

</html>

<script>
function myFunction() {

//Name
var name = document.getElementById("cName").value;

if (name == null || name == "") {
    alert("Name can't be blank");
}

// Email

            var email = document.getElementById("cEmail").value;

            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
                console.log("Valid Email");
            } 
            else if (email == null || email == "") {
                alert("Email can't be blank");


            }
            else
                alert("You have entered an invalid email address!")



//Mobile No

var mobile = document.getElementById("cMobile").value;

if (/^(?:\+88|88)?(01[3-9]\d{8})$/.test(mobile)) {
    console.log("Valid mobile");
} 
else if (mobile == null || mobile == "") {
    alert("Mobile number can't be blank");

}

else
    alert("invalid number!")


//Address

var address = document.getElementById("cAddress").value;

if (name == null || name == "") {
    alert("Address can't be blank");


}

var city = document.getElementById("cCity").value;

if (name == null || name == "") {
    alert("City can't be blank");


}
}
</script>

