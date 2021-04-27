<?php include "../../controls/Database.php" ?>

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
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['specialization'] ?></td>
                <td><?php echo $value['fees'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><a href="update.php?editid=<?php echo $value['id']; ?>" class="edit btn-update btn-big ">edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this doctor?');" href="delete.php?deleteid=<?php echo $value['id']; ?>" class="delete btn-delete btn-big">delete</a></td>
              </tr>
              <?php 
                }
}
else{
  ?>
  <td colspan="8" class="no-record">No records found</td>
<?php } ?>