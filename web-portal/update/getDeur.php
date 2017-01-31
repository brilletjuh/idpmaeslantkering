<?php

require_once '../dataController.php';

$dataController = new dController();
$result = $dataController->db_connection->query("SELECT DEUR FROM deuren WHERE id=1");

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['DEUR'];