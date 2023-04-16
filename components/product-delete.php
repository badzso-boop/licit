<?php
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include_once '../includes/dbh.inc.php';
    include_once '../includes/functions.inc.php';

    deleteProduct($mysqli, $id);
}