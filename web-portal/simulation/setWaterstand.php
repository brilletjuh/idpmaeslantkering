<?php

require_once '../dataController.php';

$dataController = new dController();
$waterstand = $_POST['data'];
$dataController->db_connection->query("UPDATE waterstand SET waterstand='$waterstand' WHERE id='1'");