<?php

include 'dbConfig.php';
include 'siteConfig.php';

if(isset($_POST['registration']))
{
	$name     		= $_POST['Name'];
	$username 		= $_POST['username'];
	$email   		= $_POST['email'];
	$password 		= $_POST['password'];
	$passwordCheck 	= $_POST['passwordCheck'];
	$mobile			= $_POST['mobile'];
	$address		= $_POST['address'];
	
	$email_check    = "SELECT * FROM owner WHERE owner_email = '$email'";
	$mobile_check   = "SELECT * FROM owner WHERE owner_mobile = '$mobile'";
	$username_check = "SELECT * FROM owner WHERE username = '$username'";
	
	$error = '';
	
	$result_email = $conn->query($email_check);
	if($result_email->num_rows > 0)
	{
		$error = "Email already exist";
		$_SESSION['email_error'] = $error;
	}
	
	$result_mobile = $conn->query($mobile_check);
	if($result_mobile -> num_rows > 0)
	{
		$error = "Mobile Registered";
		$_SESSION['mobile_error'] = $error;
	}
	
	$result_username = $conn->query($username_check);
	if($result_mobile -> num_rows > 0)
	{
		$error = "Username exist";
		$_SESSION['error_username'] = $error;
	}
	
	if(!empty($error))
	{
		header("location: index.php");
	}
		
}
?>
	