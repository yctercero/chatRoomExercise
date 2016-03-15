<?php
	session_start();
	$message = $_POST['message'];
	$user_id = $_POST['user_id'];

	$db = new PDO("mysql:host=localhost;dbname=talk;charset=utf8", "root", "root");

	$statement = $db->prepare("INSERT INTO `messages` (`messages_id`,`text`,`timestamp`, `user_id`) VALUES (NULL, :message, NULL, :user_id)");
	$statement->bindParam(":message", $message);
	$statement->bindParam(":user_id", $user_id);
	$statement->execute();

	$q = "SELECT `messages`.`text` AS `text`, `users`.`name` AS `username`, DATE_FORMAT(`messages`.`timestamp`, '%H:%i:%s') AS `time`, `users`.`user_id` AS `users_id` FROM `users`, `messages` WHERE `messages`.`user_id` = `users`.`user_id`";
	$result = $db->query($q);

	$resultObj2 = $result->fetchall(PDO::FETCH_OBJ);

	echo json_encode($resultObj2);

	// $return_string = "";

	// foreach($resultObj2 AS $r) {
	// 	if($r->users_id == $user_id){
	// 		$return_string .= "<div class='loggedUser'><h6>$r->time</h6><p>$r->username:<br/> $r->text</p></div>";
	// 	} else {
	// 		$return_string .= "<div><h6>$r->time</h6><p>$r->username: <br/> $r->text</p></div>";
	// 	}
		
	// }
	// echo $return_string;
?>