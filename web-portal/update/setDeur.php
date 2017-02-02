<?php

require_once '../dataController.php';

$dataController = new dController();
$result = $dataController->db_connection->query("SELECT DEUR FROM deuren WHERE id=1");

$row = $result->fetch(PDO::FETCH_ASSOC);

if($row['DEUR'] == 'OPEN'){
    $dataController->db_connection->query("UPDATE deuren SET DEUR='CLOSED' WHERE id=1");
}

if($row['DEUR'] == 'CLOSED'){
    $dataController->db_connection->query("UPDATE deuren SET DEUR='OPEN' WHERE id=1");
}