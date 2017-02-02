<?php

require_once '../dataController.php';

$dataController = new dController();
$deurStatus = $_POST['data'];

$dataController->db_connection->query("UPDATE deuren SET DEUR='$deurStatus' WHERE id='1'");