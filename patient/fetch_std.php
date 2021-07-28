<?php

include '../controls/Database.php';

$db = new Database();

$data = $db->fetch_std();

?>
<option value="">Select</option>
<?php

if($data)
{

foreach($data as $value)
  {
?>            
    <option><?php echo $value['specialization'] ?></option>
<?php 
  }
}
?>