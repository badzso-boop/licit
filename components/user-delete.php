<?php
session_start();

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$id = -1;

if (isset($_SESSION["type"])) {
    if ($_SESSION["type"] == "admin") {
        $id = $_GET["id"];

        deleteUser($conn, $id);
    }
    else if ($_SESSION["type"] == "user") {
        if ($_SESSION["id"] == $_GET["id"]) {
            $id = $_GET["id"];

            deleteUser($conn, $id);
        }
        else {
            echo '<script src="../js/script.js"></script>';
            echo '<script>showAlert("Nincs jogosultsága ehhez!", "../index.php")</script>';
        }
    }
}


?>