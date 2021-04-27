<?php include "../controls/Database.php" ?>
<?php
session_start();
$db = new Database();
$currentUser = $_SESSION['id'];
$user = $_POST['uname'];
// $data = $db->ajaxSearchSingleRecord("bookappointment",$user);
$sql = "SELECT b.id,p.username,p.gender,b.date,b.day,b.reason,b.status FROM bookappoint b INNER JOIN patients p ON b.uid = p.id WHERE b.d_id='$currentUser' AND p.username LIKE '%$user%'";
$result = $db->connection->query($sql);
if($result->num_rows>0)
{


$sno=1;

foreach($result as $value)
              {
                if($value['status']=='Approved'||$value['status']=='Done')
                {
?>            
              <tr>
              <td><?php echo $sno++ ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['reason'] ?></td>
                <?php
                if($value['status']=='Approved')
                { ?>
                <td class="status-1"><?php echo $value['status'] ?></td>
               <?php } else{?>
                <td class="status-2"><?php echo $value['status'] ?></td>
                <?php } ?>
                <input type="hidden" name="id" value="<?php echo $value['id'];?>">
                <td><button type="submit" name="done" class="approve btn-update btn-big">Done</button>
                </td>
                <td><button type="submit" name="decline" class="decline btn-delete btn-big">Delete</button>
                </td>
              </tr>
              <?php 
                }
            }
}
else{
  ?>
  <td colspan="8" class="no-record">No records found</td>
<?php } ?>
