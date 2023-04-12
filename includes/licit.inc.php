<?php 
session_start();

include_once 'functions.inc.php';
include_once 'dbh.inc.php';

if (isset($_POST["licitUp"])) {
    $pid = $_POST["id"];
    
    $product = getSpecificProduct($conn, $pid);

    if ($product->num_rows > 0) {
        while($seged = $product->fetch_assoc()) {
            $arak = explode("?", $seged["pPrice"]);
            if (count($arak) == 1) {
                $type = "up";
                bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 0);
            }
            else
            {
                if ($arak[count($arak)-1] == "") {
                    $type = "up";
                    bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 1);
                }
                else {
                    $type = "up";
                    bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 2);
                }
            }
        }
    }
}
else if(isset($_POST["licitDown"])) {
    $id = $_POST["id"];

    $pid = $_POST["id"];
    
    $product = getSpecificProduct($conn, $pid);

    if ($product->num_rows > 0) {
        while($seged = $product->fetch_assoc()) {
            $arak = explode("?", $seged["pPrice"]);
            if (count($arak) == 1) {
                $type = "down";
                bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 0);
            }
            else
            {
                if ($arak[count($arak)-1] == "") {
                    $type = "down";
                    bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 1);
                }
                else {
                    $type = "down";
                    bidProduct($mysqli, $conn, $_SESSION["id"], $pid, $seged["steppingPrice"], date('m/d/Y h:i:s a', time()), $type, $seged["price"], 2);
                }
            }
        }
    }
}
?>