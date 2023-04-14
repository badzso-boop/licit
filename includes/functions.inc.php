<?php
if( empty(session_id()) && !headers_sent()){
	session_start();
}
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

  	usersLog($conn, "-1", date('m/d/Y h:i:s a', time()), "RegisterUser", $username, $username);

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
		$_SESSION["id"] = $uidExists["id"];
		$_SESSION["uname"] = $uidExists["uname"];
		$_SESSION["type"] = $uidExists["type"];

		usersLog($conn, $_SESSION["id"], date('m/d/Y h:i:s a', time()), $_SESSION["type"]."LoginUser", $_SESSION["uname"], $_SESSION["id"]);

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

function updateUser($conn, $id, $name, $uname, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music, $security, $zip, $city, $addr, $phone) {
	$user = getSpecificUser($conn, $id);
	if ($user->num_rows > 0) {
		while($seged = $user->fetch_assoc()) {
			if ($seged["profileImg"] != "blank-user.png" && $profileImg == "blank-user.png") {
				$profileImg = $seged["profileImg"];
			}
			else if($seged["profileImg"] != "blank-user.png"){
				unlink('../img/'.$seged["profileImg"]);
			}
		}
	}

	$sql = "UPDATE users SET uname=?, name=?, email=?,bornDate=?,type=?,profileImg=?,about=?,links=?,badge=?,coupon=?,level=?,hobby=?,work=?,sport=?,music=?, addr=?, phone=?, zip=?, city=? WHERE id=?;";

	usersLog($conn, $_SESSION["id"], date('m/d/Y h:i:s a', time()), $_SESSION["type"]."UpdateUser", $_SESSION["uname"], $uname);

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php?error=stmtfailed");
		exit();
	}

	if ($type == "") {
		$type = "user";
	}

	mysqli_stmt_bind_param($stmt, "ssssssssssissssssisi", $uname, $name, $email, $bornDate, $type, $profileImg, $about, $links, $badge, $coupon, $level, $hobby, $work, $sport, $music, $addr, $phone, $zip, $city, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	if ($security) {
		header("location: ../admin/adminUsers.php?error=noneEdit");
		exit();
	}
	else {
		header("location: ../profile.php?error=noneEdit&id=".$id);
		exit();
	}
}

function deleteUser($conn, $id) {
	$sql = "DELETE FROM users WHERE id=".$id.";";
	$result = $conn->query($sql);

	usersLog($conn, $_SESSION["id"], date('m/d/Y h:i:s a', time()), $_SESSION["type"]."DeleteUser", $_SESSION["uname"], $id);

	header("location: ../admin/adminUsers.php?error=noneDelete");
	exit();
}

function uploadImage($file, $id, $name) {
	$target_dir = "../img/";
	$customName = $id . '_' . $name . '_'. round(microtime(true) * 1000) .'_'. basename($file["name"]);
    $target_file = $target_dir . $customName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 5000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

	return $customName;
}

#endregion


/*----------------------LOGS----------------*/
#region

function usersLog($conn, $userId, $date, $workType, $uname, $workerType) {

	echo $userId . " " . $date . " " . $workType . " " . $uname;

	$sql = 'INSERT INTO userslog (userId, uname, date, workType, workerUser) VALUES (?, ?, ?, ?, ?);';

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "issss", $userId, $uname, $date, $workType, $workerType);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function getLogs($conn) {
    $sql = "SELECT * FROM userslog ORDER BY date DESC LIMIT 5";
	$result = $conn->query($sql);

	return $result;
}

function getSpecificLog($conn, $id) {
	$sql = "SELECT * FROM userslog WHERE id=".$id.";";
	$result = $conn->query($sql);

	return $result;
}

#endregion

/*----------------------PRODUCTS----------------*/

#region
function getProducts($conn) {
    $sql = "SELECT * FROM products";
	$result = $conn->query($sql);

	return $result;
}

function getSpecificProduct($conn, $id) {
	$sql = "SELECT * FROM products WHERE id=".$id.";";
	$result = $conn->query($sql);

	return $result;
}

function emptyInputProducts($title, $description, $price, $priceMin, $steppingPrice) {
	$result;
	if (empty($title) || empty($description) || empty($price) || empty($priceMin) || empty($steppingPrice)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function uploadProductImages($title, $fajl) {
	$countfiles = count($fajl["name"]);

    $totalFileUploaded = "";
    for($i=0;$i<$countfiles;$i++){
		// echo $fajl['name'][$i] . "<br>";
		$filename = $_SESSION["id"] . '_'. $_SESSION["uname"] . '_'. $title . '_'. round(microtime(true) * 1000) .'_'. $fajl['name'][$i];

		## Location
		$location = "../img/".$filename;
		$extension = pathinfo($location,PATHINFO_EXTENSION);
		$extension = strtolower($extension);

		## File upload allowed extensions
		$valid_extensions = array("jpg","jpeg","png");

		$response = 0;
		## Check file extension
		if(in_array(strtolower($extension), $valid_extensions)) {
			## Upload file
			if(move_uploaded_file($fajl['tmp_name'][$i],$location)){

				if ($i == $countfiles-1) {
					$totalFileUploaded .= $filename;	
				}
				else {
					$totalFileUploaded .= $filename . ";";
				}
			}
		}
    }
    return $totalFileUploaded;
}

function uploadProduct($conn, $uid, $title, $description, $productImages, $postDate, $owner, $price, $priceMin, $steppingPrice) {
	$sql = "INSERT INTO products (uid, title, description, images, postDate, owner, price, priceMin, steppingPrice, pPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$pPrice = "-";

	mysqli_stmt_bind_param($stmt, "isssssiiis", $uid, $title, $description, $productImages, $postDate, $owner, $price, $priceMin, $steppingPrice, $pPrice);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin/adminProducts.php?error=noneProducts");
	exit();
}

function bidProduct($mysqli, $conn, $uid, $pid, $amount, $time, $type, $price, $semicolumn) {
	$sql = "";
	if ($type == "up" && $semicolumn == 0) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = '".($price + $amount)."?' WHERE id = ".$pid."; UPDATE products SET price = ".($price + $amount)." WHERE id = ".$pid.";";
	}

	if ($type == "up" && $semicolumn == 1) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = CONCAT(pPrice,'".($price + $amount)."') WHERE id = ".$pid."; UPDATE products SET price = ".($price + $amount)." WHERE id = ".$pid.";";
	}
	
	if ($type == "up" && $semicolumn == 2) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = CONCAT(pPrice,'?".($price + $amount)."') WHERE id = ".$pid."; UPDATE products SET price = ".($price + $amount)." WHERE id = ".$pid.";";
	}

	if ($type == "down" && $semicolumn == 0) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = '".($price - $amount)."?' WHERE id = ".$pid."; UPDATE products SET price = ".($price - $amount)." WHERE id = ".$pid.";";
	}

	if ($type == "down" && $semicolumn == 1) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = CONCAT(pPrice,'".($price - $amount)."') WHERE id = ".$pid."; UPDATE products SET price = ".($price - $amount)." WHERE id = ".$pid.";";
	}
	
	if ($type == "down" && $semicolumn == 2) {
		$sql = "INSERT INTO bid_table (uid, pid, bidAmount, timeStamp, type) VALUES (".$uid.", ".$pid.", ".$amount.", '".$time."', 'up'); UPDATE products SET pPrice = CONCAT(pPrice,'?".($price - $amount)."') WHERE id = ".$pid."; UPDATE products SET price = ".($price - $amount)." WHERE id = ".$pid.";";
	}

	echo $sql;
	$mysqli->multi_query($sql);

	do {
		if ($result = $mysqli->store_result()) {
			var_dump($result->fetch_all(MYSQLI_ASSOC));
			$result->free();
		}
	} while ($mysqli->next_result());
	
	header("location: ../components/product.php?id=".$pid."&error=noneBid");
	exit();
}

#endregion