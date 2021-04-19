<?php

include '../controls/Database.php';

$db = new Database();

$rows = $db->fetch_res();

echo json_encode($rows);
?>