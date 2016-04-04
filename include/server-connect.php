<?php
	// server-connect.php
	
	// Variables
	$host	= 'localhost';
	$user	= 'dcannan';
	$pw		= 'cis425';
	$db		= 'dcannan';
	
	// Connect to the DB
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect! (SERVER)');
?>