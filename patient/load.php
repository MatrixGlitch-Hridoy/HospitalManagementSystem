<?php include "../controls/Database.php" ?>

<?php 
session_start();
$db = new Database();
$data = $db->displayRecord("doctors");
$sno=1;
//$output="";
if($data)
{

foreach($data as $value)
              {
?>            
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
                <td class="status-1"><?php echo $value['status'] ?></td>
                <td><a href="book-appointment.php?bookid=<?php echo $value['id']?>" class="delete btn-delete btn-big">Book</a></td>
              </tr>
              <?php 
                }
}


?>