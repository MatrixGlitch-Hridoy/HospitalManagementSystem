<?php

include '../controls/Database.php';

$db = new Database();
$result_array = [];
if (isset($_POST['std']) && isset($_POST['res']) && !empty($_POST['std']) && !empty($_POST['res'])) {
    $std = $_POST['std'];
    $res = $_POST['res'];

    // $rows = $model->fetch_filter($std, $res);
    $sql = "SELECT * FROM doctors WHERE specialization = '$std' AND gender = '$res' ";
            $result = $db->connection->query($sql);
            if($result->num_rows>0)
            {
                // while($row = $result->fetch_assoc())
                // {
                //    $data[] = $row;  
                // }
                // return $data;
                foreach($result as $row)
                {
                    array_push($result_array,$row);
                }
                header('content-type:application/json');
                echo json_encode($result_array);
            }
} elseif (isset($_POST['std']) && empty($_POST['res'])) {
    $std = $_POST['std'];

    //$rows = $model->fetch_std_filter($std);
    $sql = "SELECT * FROM doctors WHERE specialization = '$std'";
    $result = $db->connection->query($sql);
    if($result->num_rows>0)
    {
        // while($row = $result->fetch_assoc())
        // {
        //    $data[] = $row;  
        // }
        // return $data;
        foreach($result as $row)
        {
            array_push($result_array,$row);
        }
        header('content-type:application/json');
        echo json_encode($result_array);
    }
} elseif (empty($_POST['std']) && isset($_POST['res'])) {
    $res = $_POST['res'];

    //$rows = $model->fetch_res_filter($res);
    $sql = "SELECT * FROM doctors WHERE gender = '$res'";
    $result = $db->connection->query($sql);
    if($result->num_rows>0)
    {
        // while($row = $result->fetch_assoc())
        // {
        //    $data[] = $row;  
        // }
        // return $data;
        foreach($result as $row)
        {
            array_push($result_array,$row);
        }
        header('content-type:application/json');
        echo json_encode($result_array);
    }
}
else{
    
    $sql = "SELECT * FROM doctors";
            $result = $db->connection->query($sql);
            if($result->num_rows>0)
            {
                // while($row = $result->fetch_assoc())
                // {
                //    $data[] = $row;  
                // }
                // return $data;
                foreach($result as $row)
                {
                    array_push($result_array,$row);
                }
                header('content-type:application/json');
                echo json_encode($result_array);
            }
            // else{
            //     echo $return = "<h4>No Record Found</h4>";
            // }
}



?>