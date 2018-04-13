<?php
session_start();

include 'dbConfig.php';
include 'siteConfig.php';

if(isset($_POST['addbusiness']))
{
	
	$business_name     = $_POST['business_name'];
	$business_address  = $_POST['business_address'];
	$business_owner    = $_POST['business_owner'];
	echo $business_owner;
	$business_password = $_POST['business_password'];
	$GSTIN             = $_POST['GSTIN'];
	$business_PAN      = $_POST['business_PAN'];
	$business_mobile   = $_POST['business_mobile'];
	
	$query = "INSERT INTO business SET business_name='$business_name', business_address='$business_address', business_owner = '$business_owner', business_password = '$business_password', GSTIN = '$GSTIN', business_PAN = '$business_PAN', business_mobile = '$business_mobile';";
	
	$result = $conn->query($query);
	
	if($result===true)
		header("location: welcome.php");
	else
	{
		$_SESSION['error'] = "Error occured while adding new business";
		header("location: welcome.php");
	}
	
}

?>