<?php include "../controls/Database.php" ?>
<?php
    $db = new Database();
    if($_POST['type']=="")
    {
        $sql = "SELECT DISTINCT specialization FROM doctors"; //distinct for remove duplicate
        $result = $db->connection->query($sql);
        $str="";
        while($row = $result->fetch_assoc())
        {
        $str .= "<option value='{$row['specialization']}'>{$row['specialization']}</option>";  
        }
       
    }
    // else if($_POST['type']=="dn")
    // {
    //     $sql = "SELECT username FROM doctors"; //distinct for remove duplicate
    //     $result = $db->connection->query($sql);
    //     $str="";
    //     while($row = $result->fetch_assoc())
    //     {
    //     $str .= "<option value='{$row['username']}'>{$row['username']}</option>";  
    //     }
    // }
    echo $str;
?>