<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$bids = getBids($conn);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($bids->num_rows > 0) {
            while($seged = $bids->fetch_assoc()) {
            echo '<a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">'.$seged["name"].' - '.$seged["owner"].'</h5>
                        <small>'.$seged["timeStamp"].'</small>
                        </div>
                        <p class="mb-1">'.$seged["bidAmount"].'</p>
                        <small>'.$seged["type"].'</small>
                    </a>';
            }
        }
    }
}