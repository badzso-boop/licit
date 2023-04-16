<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once '../components/header.php' ?>
<body>
    <?php include_once '../components/adminNav.php' ?>

    <div id="stat">
        <!-- LIST USER LOGS -->
        <div class="container">
            <div class="row">
                <div class="col col-lg-4 col-12">
                    <h1 class="text-center">Felhasználók logjai</h1>
                    <div class="list-group">
                        <?php include_once '../components/list-logs.php'; ?>
                    </div>
                </div>
                <div class="col col-lg-4 col-12">
                    <h1 class="text-center">Licitek logjai</h1>
                    <div class="list-group">
                        <?php include_once '../components/list-bids.php'; ?>
                    </div>
                </div>
                <div class="col col-lg-4 col-12">
                    <h1 class="text-center">Licitek logjai</h1>
                    <div class="list-group">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>