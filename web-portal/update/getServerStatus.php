<?php

require_once '../dataController.php';

$dataController = new dController();
$result = $dataController->db_connection->query("SELECT SERVER_1, SERVER_2 FROM status WHERE id=1");

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['SERVER_1'].','.$row['SERVER_2'];