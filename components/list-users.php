<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$users = getUsers($conn);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($users->num_rows > 0) {
            while($seged = $users->fetch_assoc()) {
                echo '<div class="card d-inline-block m-2" style="width: 18rem;">
                        <img src="../img/'.$seged['profileImg'].'" class="card-img-top d-none d-lg-block kep mx-auto mt-4" alt="'.$seged['name'].'">
                        <div class="card-body" style="height: 5rem">
                            <h5 class="card-title">'.$seged['name'].'</h5>
                            <p class="d-md-none d-lg-none d-lg-block">Felhasználónév: '.$seged['uname'].'</p>
                        </div>
                        <ul class="list-group list-group-flush d-none d-lg-block">
                            <li class="list-group-item">
                                <h5>Felhasználónév</h5>
                                <p>'.$seged['uname'].'</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Email</h5>
                                <p>'.$seged['email'].'</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Születési dátum:</h5>
                                <p>'.$seged['bornDate'].'</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Típus</h5>
                                <p>'.$seged['type'].'</p>
                            </li>
                        </ul>
                        <div class="card-body">
                            <button class="btn btn-primary" onclick="userEdit('.$seged["id"].')" class="card-link">Szerkesztés</button>
                            <button class="btn btn-primary" onclick="userDelete('.$seged["id"].')" class="card-link">Törlés</button>
                        </div>
                    </div>';
            }
        }
    }
}
