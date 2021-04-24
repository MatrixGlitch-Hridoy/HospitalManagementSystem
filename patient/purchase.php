<?php
session_start();
include '../controls/Database.php';
$db = new Database();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['purchase']))
        {
            $uname = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $payment = $_POST['payment'];

            $sql1 = "INSERT INTO manage_order(username,email,address,phone,payment) VALUES('$uname','$email','$address','$phone','$payment')";
            if($db->connection->query($sql1))
            {
                $order_id=$db->connection->insert_id;
                $sql2 = "INSERT INTO user_order(order_id,item_name,price,quantity) VALUES(?,?,?,?)";
                $stmt = $db->connection->prepare($sql2);
                if($stmt)
                {
                    $stmt->bind_param("isss",$order_id,$item_name,$price,$quantity);
                    foreach($_SESSION['cart'] as $key => $values)
                    {
                        $item_name = $values['mname'];
                        $price = $values['mprice'];
                        $quantity = $values['Quantity'];
                        $stmt->execute();
                    }
                    unset($_SESSION['cart']);
                    echo "<script>alert('Order Placed');
                    window.location.href = 'shop.php';</script >";
                }
                else{
                    echo "something wrong";
                }
            }
        }
    }
?>