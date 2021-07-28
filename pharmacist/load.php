<?php include "../controls/Database.php" ?>

<?php 
session_start();
$db = new Database();
$data = $db->displayRecord("medicine");
$sno=1;
//$output="";
if($data)
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
<tr>
    <td colspan="8" class="no-record">No records found</td>
</tr>
<?php } ?>