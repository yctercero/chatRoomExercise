<?php
	session_start();
?>
<html>
<head>
	<title>Talk</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="js.php"></script>
	<script type="text/javascript" src="talk.js"></script>
	<link rel="stylesheet" type="text/css" href="talk.css"> 
</head>
<body>
	<h1>Hi, <?php echo ucfirst($_SESSION['active']['name']);?></h1>
	<div id="display"></div>
	<div>
		<textarea name="message" id="wow"></textarea>
	</div>
	<div id="send">
		<input type="checkbox" name="send"/>Send
	</div>	
	<a href="logout.php">Logout</a>
	<!-- <p><button id="send">Send</button> </p> -->
	
</body>
</html>