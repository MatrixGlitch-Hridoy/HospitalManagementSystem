<?php
    include "../controls/Database.php";
    $db = new Database();
    $deleteid = $_REQUEST['deleteid'];
    $delete = $db->delete($deleteid,"bookappoint");
    if($delete)
    {
        echo "<script>alert('Deleted succesfully');</script>";
        echo "<script>window.location.href = 'appointment-history.php';</script>";
    }
    else{
        echo "<script>alert('Database Empty!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>