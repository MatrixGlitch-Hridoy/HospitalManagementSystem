<?php
 if(count($db->success)>0) {?>
<div class="success">
    <?php foreach ($db->success as $s){?>
        <p><?php echo $s; ?></p>
    <?php } ?>
</div>
<?php } ?>