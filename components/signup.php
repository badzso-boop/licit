<section>
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
                <small id="emailHelp" class="form-text text-muted">Az adatai biztonságban vannak nálunk!</small>
            </div>
            <div class="form-group">
                <!--DÁTUM-->
                <label for="exampleInputEmail1">Dátum</label>
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