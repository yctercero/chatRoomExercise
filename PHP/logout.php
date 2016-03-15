<?php
	session_start();
	session_destroy();
	unset($_SESSION['active']);
	header("location:login.php");
?>