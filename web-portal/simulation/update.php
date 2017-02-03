<?php

require_once '../dataController.php';

$dataController = new dController();

if($_POST['data'][0] == '1'){
    $dataController->db_connection->query("UPDATE status SET SERVER_1='ONLINE' WHERE id='1'");
}
if($_POST['data'][1] == '1'){
    $dataController->db_connection->query("UPDATE status SET SERVER_2='ONLINE' WHERE id='1'");
}

$result = $dataController->db_connection->query("SELECT DEUR FROM deuren WHERE id='1'");

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['DEUR'];