<?php
include 'dbConfig.php';

if(isset($_POST['brandName'])){
	
	$brand = $_POST['brandName'];
	
	$query = "SELECT model.name FROM model INNER JOIN brand on model.brand=brand.name WHERE brand.name='$brand';";

	$result_array = array();

	$result = $conn->query($query);

	while($row = $result->fetch_assoc())
	{
		array_push($result_array , $row['name']);
	}

	
	echo json_encode($result_array);
}
?>
