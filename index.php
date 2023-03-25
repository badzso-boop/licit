<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adnijo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <?php 
            if (isset($_SESSION['uname'])) {
                echo '<h2 class="text-center">Üdvözlöm kedves '.$_SESSION['uname'].'! Rangod: '.$_SESSION['type'].'</h2>';
            }
            else {
                echo '<h2 class="text-center">Kérem lépjen be!</h2>';
            }
        ?>
        
        <div class="row">
            <div class="col">
                <?php include_once 'components/signup.php'; ?>
            </div>
            <div class="col">
                <?php include_once 'components/login.php'; ?>
            </div>
        </div>
        <a href="logout.php">Kilépés</a>
    </div>


    <div class="container">
        <div class="row">
            <section>
                <?php 
                    require_once 'includes/dbh.inc.php';
                    require_once 'includes/functions.inc.php';
        
                    $users = getUsers($conn);
        
                    if (isset($_SESSION['uname'])) {
                        if ($users->num_rows > 0) {
                            while($seged = $users->fetch_assoc()) {
                                echo '<div class="card" style="width: 18rem;">
                                    <img src="img/'.$seged['profileImg'].'" class="card-img-top" alt="'.$seged['name'].'">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$seged['name'].'</h5>
                                        <p class="card-text">Késöbbiekben ide jöhet a saját bemutatkozó szöveg!'.$seged['about'].'</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
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
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>';
                            }
                        }
                    }

                ?>
            </section>
        </div>
    </div>
</body>
</html>