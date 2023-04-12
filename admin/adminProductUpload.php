<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once '../components/header.php' ?>
<body>
    <?php include_once '../components/adminNav.php' ?>

<section>
    <div class="container">
        <form action="../includes/productUpload.inc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <!--Cím-->
                <label for="exampleInputEmail1">Termék megnevezése</label>
                <input type="text" name="title" class="form-control" placeholder="Termék megnevezése">
            </div>
            <div class="form-group">
                <!--Termékkép-->
                <label for="exampleInputEmail1">Termékkép</label>
                <input type="file" name="productImage[]" class="form-control" multiple>
            </div>
            <div class="form-group">
                <!--LEÍRÁS-->
                <label for="exampleInputEmail1">Leírás</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <!--Ár-->
                <label for="exampleInputEmail1">Ár</label>
                <input type="number" name="price" class="form-control" placeholder="Ár">
            </div>
            <div class="form-group">
                <!--Minimum ár-->
                <label for="exampleInputEmail1">Minimum ár</label>
                <input type="number" name="priceMin" class="form-control" placeholder="Minimum ár">
            </div>
            <div class="form-group">
                <!--Árlépcső-->
                <label for="exampleInputPassword1">Árlépcső</label>
                <input type="number" name="steppingPrice" class="form-control" placeholder="Árlépcső">
                <small id="emailHelp" class="form-text text-muted">Az a mérték amennyivel a termék ára lépjen licitnél!</small>
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="productUpload">Feltöltés</button>
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
</body>
</html>