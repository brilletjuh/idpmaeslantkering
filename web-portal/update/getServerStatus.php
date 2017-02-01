<?php

require_once '../dataController.php';

$dataController = new dController();
$result = $dataController->db_connection->query("SELECT SERVER_1, SERVER_2 FROM status WHERE id=1");
$row = $result->fetch(PDO::FETCH_ASSOC);


if($row['SERVER_1'] == 'ONLINE'){
    $dataController->db_connection->query("UPDATE status SET SERVER_1='UNCHECKED' WHERE id=1");
    $StatusServer1 = 'ONLINE';
}

if($row['SERVER_2'] == 'ONLINE'){
    $dataController->db_connection->query("UPDATE status SET SERVER_2='UNCHECKED' WHERE id=1");
    $StatusServer2 = 'ONLINE';
}

if($row['SERVER_1'] == 'UNCHECKED'){
    $dataController->db_connection->query("UPDATE status SET SERVER_1='UNCHECKED1' WHERE id=1");
    $StatusServer1 = 'ONLINE';
}

if($row['SERVER_2'] == 'UNCHECKED'){
    $dataController->db_connection->query("UPDATE status SET SERVER_2='UNCHECKED1' WHERE id=1");
    $StatusServer2 = 'ONLINE';
}

if($row['SERVER_1'] == 'UNCHECKED1'){
    $dataController->db_connection->query("UPDATE status SET SERVER_1='OFFLINE' WHERE id=1");
    $StatusServer1 = 'OFFLINE';
}

if($row['SERVER_2'] == 'UNCHECKED1'){
    $dataController->db_connection->query("UPDATE status SET SERVER_2='OFFLINE' WHERE id=1");
    $StatusServer2 = 'OFFLINE';
}

if($row['SERVER_1'] == 'OFFLINE'){
    $StatusServer1 = 'OFFLINE';
}

if($row['SERVER_2'] == 'OFFLINE'){
    $StatusServer2 = 'OFFLINE';
}

echo $StatusServer1.','.$StatusServer2;