<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username']))
{
	unset($_SESSION['username']);
	$_SESSION = '';
	session_destroy();
	
	header("location: index.php");
}
else
	header("location: index.php");

?>