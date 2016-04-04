<?php
	// SQL Connection Variables
	$host		= 'localhost';
	$user		= 'root';
	$password	= '';
	$database	= 'project';
	
	// Set up MySQL connection
	$dbc = mysqli_connect($host, $user, $password, $database) or die('Error connecting to MySQL server');
?>