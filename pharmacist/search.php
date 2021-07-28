<?php include "../controls/Database.php" ?>
<?php
session_start();
$db = new Database();
$medicine = $_POST['mname'];
$sql = "SELECT * FROM medicine WHERE mname LIKE '%$medicine%'";
$data = $db->connection->query($sql);
$sno=1;
if($data->num_rows>0)
{

foreach($data as $value)
              {
?>
<tr>
    <td><?php echo $sno++ ?></td>
    <td><?php echo $value['mName'] ?></td>
    <td><?php echo $value['generic'] ?></td>
    <td><?php echo $value['mType'] ?></td>
    <td><?php echo $value['quantity'] ?></td>
    <td><?php echo $value['unitPrice'] ?></td>
    <td><img src="<?php echo $value['image'] ?>" alt="image" height="100px" width="100px"></td>
    <td><a href="update-medicine.php?editid=<?php echo $value['id']; ?>" class="edit btn-update btn-big ">edit</a></td>
    <td><a href="delete.php?deleteid=<?php echo $value['id']; ?>" class="delete btn-delete btn-big">delete</a></td>
</tr>
<?php 
                }
}
else{
  ?>
<td colspan="8" class="no-record">No records found</td>
<?php } ?>