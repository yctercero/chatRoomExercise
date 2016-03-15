<?php
	// error_reporting(E_ERROR);
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];

	$db = new PDO("mysql: host=localhost;dbname=talk;charset=utf8", "root", "root");
	$q = "SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'";
	if (isset($name) && isset($password)) {
		$result = $db->query($q);
		if ($resultObj = $result->fetchall(PDO::FETCH_OBJ)) {		
			$_SESSION['active']['name'] = $resultObj[0]->name;
			$_SESSION['active']['user_id'] = $resultObj[0]->user_id; 
			header("location:talk.php");
		} else {
			echo "Complete all fields";
			echo "<a href='login.php'>Return to Login</a>";
		}
	} else {
		echo "Complete all fields";
		echo "<a href='login.php'>Return to Login</a>";
	}

?>