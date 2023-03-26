<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once 'components/header.php' ?>
<body>

    <div class="container">
        <?php 
            if (isset($_SESSION['uname'])) {
                echo '<h2 class="text-center">Üdvözlöm kedves '.$_SESSION['uname'].'! Rangod: '.$_SESSION['type'].'</h2>';
            }
            else {
                echo '<h2 class="text-center">Kérem lépjen be!</h2>';
            }
        ?>
        
        <div class="row">
            <div class="col">
                <!-- SIGNUP -->
                <?php include_once 'components/signup.php'; ?>
            </div>
            <div class="col">
                <!-- LOGIN -->
                <?php include_once 'components/login.php'; ?>
            </div>
        </div>
        <a href="logout.php">Kilépés</a>
    </div>


    <div class="container">
        <div class="row">
            <section>
                <!-- LIST USERS -->
                <?php include_once 'components/list-users.php'; ?>
            </section>
        </div>
    </div>
</body>
</html>