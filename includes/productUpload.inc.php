<?php 
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }

    if (isset($_POST["productUpload"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $productImg = $_POST["productImage"];
        $postDate = date('m/d/Y h:i:s a', time());
        $owner = $_SESSION["uname"];
        $price = $_POST["price"];
        $priceMin = $_POST["priceMin"];
        $steppingPrice = $_POST["steppingPrice"];

        // //Üres bemenetek
        // if (emptyInputProducts($title, $description, $price, $priceMin, $steppingPrice) !== false) {
        //     header("location: ../adminProductUpload.php?error=uresBemenet");
        //     exit();
        // }

        echo $title . " - " . $description . " - " .$productImg . " - " .$postDate . " - " .$owner . " - " .$price . " - " .$priceMin . " - " .$steppingPrice;
    }
?>