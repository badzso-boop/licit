<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$products = getProducts($conn);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($products->num_rows > 0) {
            while($seged = $products->fetch_assoc()) {
                
            }
        }
    }
}
