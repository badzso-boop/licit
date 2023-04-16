<?php  
    if (isset($_POST["productEditSave"])) {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $owner = "-";
        if ($_POST["owner"] != "Felhasználók...") {
            $owner = $_POST["owner"];
        }
        $price = $_POST["price"];
        $priceMin = $_POST["priceMin"];
        $steppingPrice = $_POST["steppingPrice"];

        include_once 'functions.inc.php';
        include_once 'dbh.inc.php';

        $type = $_SESSION["type"];

        updateProduct($conn, $title, $description, $owner, $price, $priceMin, $steppingPrice, $id, $type);
    }
    else if (isset($_POST["productEditBack"])) {
        header("location: ../admin/adminProducts.php");
		exit();
    }
?>