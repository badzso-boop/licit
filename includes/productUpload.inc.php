<?php 
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }

    if (isset($_POST["productUpload"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $postDate = date('Y/m/d h:i:s a', time());
        $owner = $_SESSION["uname"];
        $price = $_POST["price"];
        $priceMin = $_POST["priceMin"];
        $steppingPrice = $_POST["steppingPrice"];

        include_once 'functions.inc.php';
        include_once 'dbh.inc.php';

        //Üres bemenetek
        if (emptyInputProducts($title, $description, $price, $priceMin, $steppingPrice) !== false) {
            header("location: ../adminProductUpload.php?error=uresBemenet");
            exit();
        }

        $productImages = uploadProductImages($title, $_FILES["productImage"]);

        //echo $title . " - " . $description . " - " .$productImages . " - " .$postDate . " - " .$owner . " - " .$price . " - " .$priceMin . " - " .$steppingPrice;
        uploadProduct($conn, $_SESSION["id"], $title, $description, $productImages, $postDate, $owner, $price, $priceMin, $steppingPrice);
    }
?>