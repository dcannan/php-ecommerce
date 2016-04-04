<?php
	// logout.php
	// Dan Cannan
		
	session_name("customer");
	session_start("customer");
	session_unset("customer");
	session_destroy("customer");
	header('Location: loggedout.php');
?>