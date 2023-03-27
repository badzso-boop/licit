<?php include_once 'header.php' ?>

<section class="m-3">
    <h2>Regisztráció</h2>
    <div>
        <form action="includes/signup.inc.php" method="post">
            <div class="form-group">
                <!--TELJES NÉV-->
                <label for="exampleInputEmail1">Teljes név</label>
                <input type="text" name="name" class="form-control" placeholder="Teljes név">
            </div>
            <div class="form-group">
                <!--FELHASZNÁLÓNÉV-->
                <label for="exampleInputEmail1">Felhasználónév</label>
                <input type="text" name="fname" class="form-control" placeholder="Felhasználónév">
            </div>
            <div class="form-group">
                <!--E-MAIL CÍM-->
                <label for="exampleInputEmail1">Email cím</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                <!-- <small id="emailHelp" class="form-text text-muted">Az adatai biztonságban vannak nálunk!</small> -->
            </div>
            <div class="form-group">
                <!--DÁTUM-->
                <label for="exampleInputEmail1">Születési dátum</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <!--JELSZÓ-->
                <label for="exampleInputPassword1">Jelszó</label>
                <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
            </div>
            <div class="form-group">
                <!--JELSZÓ-->
                <label for="exampleInputPassword1">Jelszó újra</label>
                <input type="password" name="jelszorpt" class="form-control" placeholder="Jelszó újra">
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="reg">Regisztráció</button>
        </form>
    </div>
    <div id="uzenetek">
        <div id="emptyInput" class="alert alert-danger m-3 d-none" role="alert">Töltsd ki az összes mezőt!</div>
        <div id="badUname" class="alert alert-danger m-3 d-none" role="alert">Használj megfelelő felhasználónevet!</div>
        <div id="badEmail" class="alert alert-danger m-3 d-none" role="alert">Használj megfelelő email címet!</div>
        <div id="pwdDontMatch" class="alert alert-danger m-3 d-none" role="alert">Jelszavak nem egyeznek!</div>
        <div id="error" class="alert alert-danger m-3 d-none" role="alert">Hupsz valami hiba történt!</div>
        <div id="unameTaken" class="alert alert-danger m-3 d-none" role="alert">Felhasználónév már foglalat!</div>
        <div id="good" class="alert alert-success m-3 d-none" role="alert">Gratulálok! Sikeres regisztráció!</div>
    </div>
    
    <?php
        // Error messages
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "uresBemenet") {
                echo '<script type="text/javascript">removeHideClass("emptyInput");</script>';
            }
            else if ($_GET["error"] == "rosszfname") {
                echo '<script type="text/javascript">removeHideClass("badUname");</script>';
            }
            else if ($_GET["error"] == "rosszemail") {
                echo '<script type="text/javascript">removeHideClass("badEmail");</script>';
            }
            else if ($_GET["error"] == "jelszoNemEgyezik") {
                echo '<script type="text/javascript">removeHideClass("pwdDontMatch");</script>';
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo '<script type="text/javascript">removeHideClass("error");</script>';
            }
            else if ($_GET["error"] == "fnameHasznalt") {
                echo '<script type="text/javascript">removeHideClass("unameTaken");</script>';
            }
            else if ($_GET["error"] == "noneReg") {
                echo '<script type="text/javascript">removeHideClass("good");</script>';
            }
        }
    ?>
</section>