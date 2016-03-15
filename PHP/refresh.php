<?php
	$user_id = $_POST['user_id'];

	$db = new PDO("mysql:host=localhost;dbname=talk;charset=utf8", "root", "root");

	$q = "SELECT `messages`.`text` AS `text`, `users`.`name` AS `username`, DATE_FORMAT(`messages`.`timestamp`, '%H:%i:%s') AS `time`, `users`.`user_id` AS `users_id` FROM `users`, `messages` WHERE `messages`.`user_id` = `users`.`user_id`";
	$result = $db->query($q);

	$resultObj2 = $result->fetchall(PDO::FETCH_OBJ);

	echo json_encode($resultObj2);
?>