<?php include '../controls/Database.php'; ?>
<?php
$db = new Database();
if (isset($_POST['select_std']) && isset($_POST['select_res']) && !empty($_POST['select_std']) && !empty($_POST['select_res'])) {
    $std = $_POST['select_std'];
    $res = $_POST['select_res'];

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
                $sno=1;
                foreach($result as $value)
                { ?>
                
                <tr>
              <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <!-- <td><?php echo $value['email'] ?></td> -->
                <td><?php echo $value['specialization'] ?></td>
                <td><?php echo $value['fees'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['day'] ?></td>
                <td><?php echo $value['stime'] ?></td>
                <td><?php echo $value['etime'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><a href="book-appointment.php?bookid=<?php echo $value['id']?>" class="delete btn-delete btn-big">Book</a></td>
              </tr>
                
                <?php    // array_push($result_array,$row);
                }
                // header('content-type:application/json');
                // echo json_encode($result_array);
            }
            else{
              ?>
              <td></td>
              <td></td>
              <td colspan="8" class="no-record">No records found</td>
              <td></td>
              <td></td>
            <?php } 
} 

else if (isset($_POST['select_std']) && empty($_POST['select_res'])) {
    $std = $_POST['select_std'];

    // $rows = $model->fetch_filter($std, $res);
    $sql = "SELECT * FROM doctors WHERE specialization = '$std'";
            $result = $db->connection->query($sql);
            if($result->num_rows>0)
            {
                // while($row = $result->fetch_assoc())
                // {
                //    $data[] = $row;  
                // }
                // return $data;
                $sno=1;
                foreach($result as $value)
                { ?>
                
                <tr>
              <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <!-- <td><?php echo $value['email'] ?></td> -->
                <td><?php echo $value['specialization'] ?></td>
                <td><?php echo $value['fees'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['day'] ?></td>
                <td><?php echo $value['stime'] ?></td>
                <td><?php echo $value['etime'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><a href="book-appointment.php?bookid=<?php echo $value['id']?>" class="delete btn-delete btn-big">Book</a></td>
              </tr>
                
                <?php    // array_push($result_array,$row);
                }
                // header('content-type:application/json');
                // echo json_encode($result_array);
            }
}
else if (empty($_POST['select_std']) && isset($_POST['select_res'])) {
    $res = $_POST['select_res'];

    // $rows = $model->fetch_filter($std, $res);
    $sql = "SELECT * FROM doctors WHERE gender = '$res'";
            $result = $db->connection->query($sql);
            if($result->num_rows>0)
            {
                // while($row = $result->fetch_assoc())
                // {
                //    $data[] = $row;  
                // }
                // return $data;
                $sno=1;
                foreach($result as $value)
                { ?>
                
                <tr>
              <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <!-- <td><?php echo $value['email'] ?></td> -->
                <td><?php echo $value['specialization'] ?></td>
                <td><?php echo $value['fees'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['day'] ?></td>
                <td><?php echo $value['stime'] ?></td>
                <td><?php echo $value['etime'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><a href="book-appointment.php?bookid=<?php echo $value['id']?>" class="delete btn-delete btn-big">Book</a></td>
              </tr>
                
                <?php    // array_push($result_array,$row);
                }
                // header('content-type:application/json');
                // echo json_encode($result_array);
            }
}
else{
    ?>
    <td colspan="8" class="no-record">No records found</td>
  <?php } ?>
