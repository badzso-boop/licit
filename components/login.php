<section>
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
