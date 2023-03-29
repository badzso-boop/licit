<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adnijo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


    <script src="../js/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<?php
    session_start();
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "noneDelete") {
            echo '<script type="text/javascript">showAlert("Sikeres felhasználó törlés!", "adminUsers.php");</script>';
        }
        else if ($_GET["error"] == "noneEdit") {
            echo '<script type="text/javascript">showAlert("Sikeres felhasználó szerkesztés!", "adminUsers.php");</script>';
        }
    }
    include_once '../components/adminNav.php';
?>

<!-- LIST USERS -->
<div class="container">
    <?php include_once '../components/list-users.php'; ?>
</div>