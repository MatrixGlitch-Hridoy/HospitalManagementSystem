
<?php
 if(count($db->errors)>0) {?>
<div class="error">
    <?php foreach ($db->errors as $error){?>
        <p><?php echo $error; ?></p>
    <?php } ?>
</div>
<?php } ?>