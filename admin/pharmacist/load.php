<?php include "../../controls/Database.php" ?>

<?php 
session_start();
$db = new Database();
$data = $db->displayRecord("pharmacists");
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
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><a href="update.php?editid=<?php echo $value['id']; ?>" class="edit btn-update btn-big ">edit</a></td>
                <td><a href="delete.php?deleteid=<?php echo $value['id']; ?>" class="delete btn-delete btn-big">delete</a></td>
              </tr>
              <?php 
                }
}


?>