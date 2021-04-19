<?php

include '../controls/Database.php';

$db = new Database();

$rows = $db->fetch_std();

echo json_encode($rows);
?>