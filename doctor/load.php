<?php include '../controls/Database.php'; ?>
<?php
    session_start();
    $db = new Database();
    $currentUser = $_SESSION['id'];
    $data=$db->displayApproved($currentUser);
    $sno=1;
//$output="";
if($data)
{

foreach($data as $value)
              {
                  if($value['status']=='Approved')
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


    