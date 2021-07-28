<?php
session_start();
include '../controls/Database.php';
$db = new Database();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $myitems=array_column($_SESSION['cart'], 'mname');
                if(in_array($_POST['mname'],$myitems))
                {
                   echo "<script>alert('Item Already Added');
                    window.location.href = 'shop.php';</script >";
                }
                else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count]=array('mname'=> $_POST['mname'],'mprice'=> $_POST['mprice'],'generic'=> $_POST['generic'],'mtype'=> $_POST['mtype'],'image'=>$_POST['image'],'Quantity'=>1);
                    echo "<script>alert('Item Added');
                        window.location.href = 'shop.php';</script >";
                }
            }
            else{
                $_SESSION['cart'][0]=array('mname'=> $_POST['mname'],'mprice'=> $_POST['mprice'],'generic'=> $_POST['generic'],'mtype'=> $_POST['mtype'],'image'=>$_POST['image'],'Quantity'=>1);
                echo "<script>alert('Item Added');
                    window.location.href = 'shop.php';</script >";
            }
        }
        if(isset($_POST['remove']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['mname']==$_POST['mname'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo "<script>alert('Item Removed');
                    window.location.href = 'mycart.php';</script >";
                }
            }
        }
        if(isset($_POST['mod_quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['mname']==$_POST['mname'])
                {
                    $_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];
                    echo "<script>window.location.href = 'mycart.php';</script >";
                }
            }
        }
    }
?>