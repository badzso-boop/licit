<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$logs = getLogs($conn);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($logs->num_rows > 0) {
            while($seged = $logs->fetch_assoc()) {
            echo '<a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">'.$seged["userId"].' - '.$seged["uname"].'</h5>
                        <small>'.$seged["date"].'</small>
                        </div>
                        <p class="mb-1">'.$seged["workType"].'</p>
                        <small>'.$seged["workerUser"].'</small>
                    </a>';
            }
        }
    }
}