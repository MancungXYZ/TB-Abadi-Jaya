<?php 
 
	// include first the function in your other file
	include "backup.php";
 
	//Database Credentials Vairables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "db_abadiJaya";
 
	// Initiating the backup database function
	backDb($servername, $username, $password, $db_name);
?>