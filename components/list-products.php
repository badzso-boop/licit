<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$products = getProducts($conn);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($products->num_rows > 0) {
            while($seged = $products->fetch_assoc()) {
                $kepek = explode(";", $seged["images"]);
                $datum = explode(" ", $seged["postDate"]);

                echo '<div class="card d-inline-block m-2" style="width: 18rem;">
                        <img src="../img/'.$kepek[0].'" class="card-img-top d-none d-md-block kep mx-auto mt-4" alt="'.$seged["title"].'">
                        <div class="card-body">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="card-title"><b>'.$seged["title"].'</b></h5>
                                <small>Feltöltő: '.$seged["owner"].'</small>
                            </div>
                            <p class="card-text">'.substr($seged["description"],0,255).'......</p>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <p class="list-group-item">Ár: '.number_format($seged["price"], 0, '.', '.').' Ft</p>
                                <p class="list-group-item">'.$datum[0].'</p>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="../components/product.php?id='.$seged["id"].'" class="btn btn-primary m-auto">Bővebben</a>
                                <a href="components/product-delete.php?id='.$seged["id"].'" class="btn btn-danger m-auto">Törlés</a>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
}
