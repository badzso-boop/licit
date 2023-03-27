<?php 
if (isset($_POST["userEditSave"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $bornDate = $_POST["borndate"];
    $type = $_POST["type"];
    $profileImg = $_POST["profileImg"];
    $about = $_POST["about"];
    $links = $_POST["links"];
    $badge = $_POST["badge"];
    $coupon = $_POST["coupon"];
    $level = $_POST["level"];
    $hobby = $_POST["hobby"];
    $work = $_POST["work"];
    $sport = $_POST["sport"];
    $music = $_POST["music"];

    require_once "dbh.inc.php";
    require_once 'functions.inc.php';

    if ($profileImg == "") {
        $profileImg = "blank-user.png";
    }

    updateUser($conn, $id, $name, $uname, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music);
}
else if (isset($_POST["userEditBack"])) {
    header("location: ../admin.php");
    exit();
}