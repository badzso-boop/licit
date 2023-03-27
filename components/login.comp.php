<?php include_once 'header.php' ?>

<section clasS="m-3">
    <h2>Belépés</h2>
    <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post">
            <div class="form-group">
                <label>Felhasználónév</label>
                <input type="text" name="fname" class="form-control" placeholder="Felhasználónév">
            </div>
            <div class="form-group">
                <label>Jelszó</label>
                <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="belep">Belépés</button>
        </form>
    </div>
    <div id="uzenetek">
        <div id="emptyInputLogin" class="alert alert-danger m-3 d-none" role="alert">Töltsd ki az összes mezőt!</div>
        <div id="errorLogin" class="alert alert-danger m-3 d-none" role="alert">Hupsz nem stimmelnek az adatok!</div>
        <div id="goodLogin" class="alert alert-success m-3 d-none" role="alert">Gratulálok! Sikeres belépés!</div>
    </div>
    <?php
        // Error messages
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "uresBemenetBelep") {
                echo '<script type="text/javascript">removeHideClass("emptyInputLogin");</script>';
            }
            else if ($_GET["error"] == "rosszBelepesBelep") {
                echo '<script type="text/javascript">removeHideClass("errorLogin");</script>';
            }
            else if ($_GET["error"] == "noneBelepes") {
                echo '<script type="text/javascript">removeHideClass("goodLogin");</script>';
            }
        }
    ?>
</section>