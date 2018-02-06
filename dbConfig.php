<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "businessmanagement";


	$conn = new mysqli($host, $user, $pass, $db);


	if($conn->connect_error)
		die( "connection error".$conn->connect_error);
	
?>