<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <?php include_once '../components/header.php' ?>
<body>
    <?php include_once '../components/adminNav.php' ?>

    <div id="products" class="container">
        <h1 class="text-center">Termékek listája</h1>
        <?php include_once '../components/list-products.php' ?>
    </div>

    <br>
    <br>
    <br>
    <br>
</body>
</html>