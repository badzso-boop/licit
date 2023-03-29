<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once 'components/header.php' ?>
<body>
    <?php include_once 'components/headerNav.php' ?>

    <div class="container">
        <?php 
            if (isset($_SESSION['uname'])) {
                echo '<h2 class="text-center">Üdvözlöm kedves '.$_SESSION['uname'].'! Rangod: '.$_SESSION['type'].'</h2>';
            }
            else {
                echo '<h1 class="text-center">Még nincs belépve hozzon létre egy fiókot vagy lépjen be!</h1>
                        <div class="container text-center">
                            <a class="d-inline-block nav-link text-center" href="login.php">
                                <i class="bi bi-box-arrow-in-right icon"></i>
                                <p class="icon-text">Belépés</p>
                            </a>
                            <a class="d-inline-block nav-link text-center" href="signup.php">
                                <i class="bi bi-person-plus icon"></i>
                                <p class="icon-text">Regisztráció</p>
                            </a>
                        </div>';
            }
        ?>

        <div id="uzenetek">
            <div id="good" class="alert alert-success m-3 d-none" role="alert">Gratulálok! Sikeres regisztráció!</div>
            <div id="goodLogin" class="alert alert-success m-3 d-none" role="alert">Gratulálok! Sikeres belépés!</div>
        </div>

        <?php
            // Error messages
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "noneBelepes") {
                    echo '<script type="text/javascript">removeHideClass("goodLogin");</script>';
                }
                else if ($_GET["error"] == "noneReg") {
                    echo '<script type="text/javascript">removeHideClass("good");</script>';
                }
            }
        ?>

        
        <br>
        <br>
        <br>
        <br>
        <h1>Termékek listája:</h1>
        
    </div>
    <div class="spacer"></div>

    <?php include_once 'components/footerNav.php'; ?>
</body>
</html>