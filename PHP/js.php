<?php
	header('Content-Type: application/javascript');
	session_start();
?>
var sendData = <?php echo $_SESSION['active']['user_id']; ?>

<!--   -->