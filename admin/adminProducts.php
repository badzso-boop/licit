<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once '../components/header.php' ?>
<body>
    <?php include_once '../components/adminNav.php' ?>

    <div id="products">
        <h1>Termékek listája</h1>
        <?php include_once '../components/list-products.php' ?>
    </div>
</body>
</html>