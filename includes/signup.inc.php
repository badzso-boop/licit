<?php
if (isset($_POST["reg"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["fname"];
  $bornDate = $_POST['date'];
  $pwd = $_POST["jelszo"];
  $pwdRepeat = $_POST["jelszorpt"];

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  //Üres bemenetek
  if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=uresBemenet");
		exit();
  }
  
	//Rossz felhasználónév
  if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=rosszfname");
		exit();
  }
  //Helyes email cim
  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=rosszemail");
		exit();
  }
  //Jelszavak egyezese
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=jelszoNemEgyezik");
		exit();
  }
  //Felhasznalonev nincs-e elfoglalva
  if (uidExists($conn, $username) !== false) {
    header("location: ../signup.php?error=fnameHasznalt");
		exit();
  }

  createUser($conn, $name, $email, $username, $bornDate, $pwd);
} else {
	header("location: ../signup.php");
    exit();
}