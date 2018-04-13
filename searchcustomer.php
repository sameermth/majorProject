<?php

include 'dbConfig.php';
include 'siteConfig.php';

if(isset($_POST['customer_id'])){
	
	$customer_id = $_POST['customer_id'];
	
	$query = "SELECT * FROM customer where customer_id='$customer_id';";
	$result = $conn->query($query);
	
	$row = $result->fetch_assoc();
	
	echo json_encode($row);
	
}