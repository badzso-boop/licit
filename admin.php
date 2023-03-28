<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once 'components/header.php' ?>
<body>
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-person icon"></i>
                <p class="m-auto">Felhasználó kezelés</p>
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "noneDelete") {
                            echo '<script type="text/javascript">showAlert("Sikeres felhasználó törlés!", "admin.php");</script>';
                        }
                        else if ($_GET["error"] == "noneEdit") {
                            echo '<script type="text/javascript">showAlert("Sikeres felhasználó szerkesztés!", "admin.php");</script>';
                        }
                    }
                ?>
                <!-- LIST USERS -->
                <?php include_once 'components/list-users.php'; ?>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="bi bi-box2 icon"></i>
                <p class="m-auto">Termék kezelés</p>
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <!-- LIST PRODUCTS -->
                <h1>Ide jönnek majd a termékek listái</h1>
            </div>
            </div>
        </div>
    </div>
    <?php include_once 'components/footer.php'; ?>

    <div class="spacer"></div>

    <?php include_once 'components/footerNav.php'; ?>
</body>
</html>