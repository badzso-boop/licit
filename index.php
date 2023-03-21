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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <div class="container">
        <?php 
            if (isset($_SESSION['fnev'])) {
                echo '<h2 class="text-center">Üdvözlöm kedves '.$_SESSION['fnev'].'!</h2>';
            }
            else {
                echo '<h2 class="text-center">Kérem lépjen be!</h2>';
            }
        ?>
        
        <div class="row">
            <div class="col">
                <section>
                    <h2>Regisztráció</h2>
                    <div>
                        <form action="includes/signup.inc.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teljes név</label>
                                <input type="text" name="name" class="form-control" placeholder="Teljes név">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Felhasználónév</label>
                                <input type="text" name="fname" class="form-control" placeholder="Felhasználónév">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email cím</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <small id="emailHelp" class="form-text text-muted">Az adatai biztonságban vannak nálunk!</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jelszó</label>
                                <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jelszó újra</label>
                                <input type="password" name="jelszorpt" class="form-control" placeholder="Jelszó újra">
                            </div>
                            <button type="submit" class="btn btn-primary" name="reg">Regisztráció</button>
                        </form>
                    </div>
                    
                    <?php
                        // Error messages
                        if (isset($_GET["error"])) {
                        if ($_GET["error"] == "uresBemenet") {
                            echo '<div class="alert alert-danger m-3" role="alert">Töltsd ki az összes mezőt!</div>';
                        }
                        else if ($_GET["error"] == "rosszfname") {
                            echo '<div class="alert alert-danger m-3" role="alert">Használj megfelelő felhasználónevet!</div>';
                        }
                        else if ($_GET["error"] == "rosszemail") {
                            echo '<div class="alert alert-danger m-3" role="alert">Használj megfelelő email címet!</div>';
                        }
                        else if ($_GET["error"] == "jelszoNemEgyezik") {
                            echo '<div class="alert alert-danger m-3" role="alert">Jelszavak nem egyeznek!</div>';
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo '<div class="alert alert-danger m-3" role="alert">Hupsz valami hiba történt!</div>';
                        }
                        else if ($_GET["error"] == "fnameHasznalt") {
                            echo '<div class="alert alert-danger m-3" role="alert">Felhasználónév már foglalat!</div>';
                        }
                        else if ($_GET["error"] == "noneReg") {
                            echo '<div class="alert alert-success m-3" role="alert">Gratulálok! Sikeres regisztráció!</div>';
                        }
                        }
                    ?>
                </section>
            </div>
            <div class="col">
                <section>
                    <h2>Belépés</h2>
                    <div class="signup-form-form">
                        <form action="includes/login.inc.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teljes név</label>
                                <input type="text" name="fname" class="form-control" placeholder="Felhasználónév">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jelszó</label>
                                <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
                            </div>
                            <button type="submit" class="btn btn-primary" name="belep">Belépés</button>
                        </form>
                    </div>
                    <?php
                        // Error messages
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "uresBemenetBelep") {
                                echo '<div class="alert alert-danger m-3" role="alert">Töltsd ki az összes mezőt!</div>';
                            }
                            else if ($_GET["error"] == "rosszBelepesBelep") {
                                echo '<div class="alert alert-danger m-3" role="alert">Hupsz nem stimmelnek az adatok!</div>';
                            }
                            else if ($_GET["error"] == "noneBelepes") {
                                echo '<div class="alert alert-success m-3" role="alert">Gratulálok! Sikeres belépés!</div>';
                            }
                        }
                    ?>
                </section>
            </div>
        </div>
    </div>
</body>
</html>