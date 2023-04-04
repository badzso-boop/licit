<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once 'components/header.php' ?>
<body>
    <?php include_once 'components/headerNav.php' ?>

    <?php
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $id = $_GET["id"];

        $user = getSpecificUser($conn, $id); 

        if ($user->num_rows > 0) {
            while($seged = $user->fetch_assoc()) {
                echo '<div class="container my-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="../img/'.$seged['profileImg'].'" class="card-img-top kep kep-telo d-block mx-auto mt-4" alt="'.$seged['name'].'">
                                <div class="text-center m-4">
                                    <h2>'.$seged["uname"].'</h2>
                                    <span class="badge bg-secondary mb-3">'.$seged['badge'].'</span>
                                    <h4>Level: <b>'.$seged['level'].'</b></h4>
                                    <h4>Type: <b>'.$seged['type'].'</b></h4>
                                </div>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item m-3">Név: <br>'.$seged["name"].'</li>
                                    <li class="list-group-item m-3">Email: <br><a href="mailto:'.$seged["email"].'">'.$seged["email"].'</a></li>
                                    <li class="list-group-item m-3">Cím: <br>'.$seged['zip'].' - '.$seged['city'].' - '.$seged['addr'].'</li>
                                    <li class="list-group-item m-3">Telefon: <br><a href="tel:'.$seged['phone'].'">'.$seged['phone'].'</a></li>
                                    <li class="list-group-item m-3">Születési dátum: <br>'.$seged["bornDate"].'</li>
                                </ul>
                            </div>
                        </div>
                        <hr class="border border-primary border-3 opacity-75">
                        <div class="row">
                            <div class="col">
                            <h3 clasS="text-center">Linkek</h3>
                            <ul class="list-group list-group-flush mt-4">';
                                $linkek = explode(",", $seged["links"]);
                                for($i=0;$i<count($linkek);$i++){
                                    echo '<li class="list-group-item m-2"><a href="'.$linkek[$i].'">'.$linkek[$i].'</a></li>';
                                }
                            echo    '</ul>
                            </div>
                            <div class="col">
                                <div class="list-group mt-4">
                                    <a class="list-group-item" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Hobbi</h5>
                                        </div>
                                        <p class="mb-1">'.$seged["hobby"].'</p>
                                    </a>
                                    <a class="list-group-item" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Munka</h5>
                                        </div>
                                        <p class="mb-1">'.$seged["work"].'</p>
                                    </a>
                                    <a class="list-group-item" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Sport</h5>
                                        </div>
                                        <p class="mb-1">'.$seged["sport"].'</p>
                                    </a>
                                    <a class="list-group-item" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Zenei előadó</h5>
                                        </div>
                                        <p class="mb-1">'.$seged["music"].'</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <h3 clasS="text-center">Rólam</h3>
                                <p class="m-4">'.$seged["about"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" onclick="userEdit('.$seged["id"].')">Szerkesztés</button>
                                <button class="btn btn-danger" onclick="userDelete('.$seged["id"].')">Fiók törlése</button>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                    </div>
                    <div class="spacer"></div>';
            }
        }
        include_once 'components/footerNav.php';
    ?>
</body>
</html>