<?php 
if (isset($_POST["userEditSave"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $bornDate = $_POST["borndate"];
    $type = $_POST["type"];
    $profileImg = basename($_FILES["profileImg"]["name"]);;
    $about = $_POST["about"];
    
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["links".$i];
        }
        else {
            $tmp .= $_POST["links".$i].',';
        }
    }
    $links = $tmp;

    $badge = $_POST["badge"];
    $coupon = $_POST["coupon"];
    $level = $_POST["level"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $addr = $_POST["addr"];
    $phone = $_POST["phone"];
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["hobby".$i];
        }
        else {
            $tmp .= $_POST["hobby".$i].',';
        }
    }
    $hobby = $tmp;


    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["work".$i];
        }
        else {
            $tmp .= $_POST["work".$i].',';
        }
    }
    $work = $tmp;


    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["sport".$i];
        }
        else {
            $tmp .= $_POST["sport".$i].',';
        }
    }
    $sport = $tmp;

    
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["music".$i];
        }
        else {
            $tmp .= $_POST["music".$i].',';
        }
    }
    $music = $tmp;

    require_once "dbh.inc.php";
    require_once 'functions.inc.php';

    if (!($_FILES["profileImg"]["tmp_name"] == "")) {
        $profileImg = uploadImage($_FILES["profileImg"], $id, $name);
    }
    else {
        $profileImg = "blank-user.png";
    }

    $security = true;


    updateUser($conn, $id, $name, $uname, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music, $security, $zip, $city, $addr, $phone);
}
else if (isset($_POST["userEditBack"])) {
    header("location: ../admin/admin.php");
    exit();
}
else if (isset($_POST["userEditSaveUser"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $bornDate = $_POST["borndate"];
    if (isset($_POST["type"])) {
        $type = $_POST["type"];
    }
    else {
        $type = "user";
    }
    $profileImg = basename($_FILES["profileImg"]["name"]);;
    $about = $_POST["about"];
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["links".$i];
        }
        else {
            $tmp .= $_POST["links".$i].',';
        }
    }
    $links = $tmp;
    $badge = $_POST["badge"];
    $coupon = $_POST["coupon"];
    $level = $_POST["level"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $addr = $_POST["addr"];
    $phone = $_POST["phone"];
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["hobby".$i];
        }
        else {
            $tmp .= $_POST["hobby".$i].',';
        }
    }
    $hobby = $tmp;


    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["work".$i];
        }
        else {
            $tmp .= $_POST["work".$i].',';
        }
    }
    $work = $tmp;


    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["sport".$i];
        }
        else {
            $tmp .= $_POST["sport".$i].',';
        }
    }
    $sport = $tmp;

    
    $tmp = "";
    for ($i=0; $i < 5; $i++) { 
        if ($i == 4) {
            $tmp .= $_POST["music".$i];
        }
        else {
            $tmp .= $_POST["music".$i].',';
        }
    }
    $music = $tmp;

    require_once "dbh.inc.php";
    require_once 'functions.inc.php';

    if (!($_FILES["profileImg"]["tmp_name"] == "")) {
        $profileImg = uploadImage($_FILES["profileImg"], $id, $name);
    }
    else {
        $profileImg = "blank-user.png";
    }

    $security = false;

    updateUser($conn, $id, $name, $uname, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music, $security, $zip, $city, $addr, $phone);
}
else if (isset($_POST["userEditBackUser"])) {
    $id = $_POST["id"];
    header("location: ../profile.php?id=".$id);
    exit();
}