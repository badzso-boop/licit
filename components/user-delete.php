<?php 
$id = $_GET["id"];

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

deleteUser($conn, $id);
?>