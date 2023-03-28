<?php
/*--------------------Regisztráció---------------------*/
#region
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE uname = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $bornDate, $pwd) {
  $sql = "INSERT INTO users (uname, name, email, bornDate, type, pwd, profileImg) VALUES (?, ?, ?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	$type = "user";
	$profileImg = "blank-user.png";

	mysqli_stmt_bind_param($stmt, "sssssss", $username, $name, $email, $bornDate, $type, $hashedPwd, $profileImg);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../index.php?error=noneReg");
	exit();
}
#endregion

/*----------------------Belépés----------------*/
#region
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=rosszBelepesBelep");
		exit();
	}

	$pwdHashed = $uidExists["pwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=rosszBelepesBelep");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["uname"] = $uidExists["uname"];
		$_SESSION["type"] = $uidExists["type"];

		header("location: ../index.php?error=noneBelepes");
		exit();
	}
}
#endregion


/*----------------------Felhasználók----------------*/

#region
function getUsers($conn) {
    $sql = "SELECT * FROM users";
	$result = $conn->query($sql);

	return $result;
}

function getSpecificUser($conn, $id) {
	$sql = "SELECT * FROM users WHERE id=".$id.";";
	$result = $conn->query($sql);

	return $result;
}

function updateUser($conn, $id, $name, $uname, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music) {
	$sql = "UPDATE users SET uname = ?, name = ?, email = ?,bornDate = ?,type = ?,profileImg = ?,about = ?,links = ?,badge = ?,coupon = ?,level = ?,hobby = ?,work = ?,sport = ?,music = ? WHERE id = ?";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $uname, $name, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=noneEdit");
	exit();
}

function deleteUser($conn, $id) {
	$sql = "DELETE FROM users WHERE id=".$id.";";
	$result = $conn->query($sql);

	header("location: ../admin.php?error=noneDelete");
	exit();
}

#endregion