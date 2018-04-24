<?php

include 'siteConfig.php';
include 'dbConfig.php';

if(isset($_POST['signin'])){
	$user= $_POST['username'];
	$pass= $_POST['password'];
	
	$sql = "SELECT username FROM owner WHERE username ='$user' and password = '$pass'";
	
	$result = $conn -> query($sql);
	print_r($result);
	if($result->num_rows >0)
		{
			$row = $result->fetch_assoc();
			session_start();
			$_SESSION['username'] = $row['username'];
			$result->close();
			//header("location: ".HOME_URL."/welcome.php");
		}
		else
		{
			//header("location: ./");
		}
	}
	else
		//header("location: ./");

?>