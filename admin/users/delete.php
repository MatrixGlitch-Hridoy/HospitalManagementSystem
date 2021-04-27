<?php
    include "../../controls/Database.php";
    $db = new Database();
    $deleteid = $_REQUEST['deleteid'];
    $delete = $db->delete($deleteid,"patients");
    if($delete)
    {
        //echo "<script>alert('Deleted succesfully');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>