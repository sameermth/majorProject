<?php

	include 'dbConfig.php';
	
	if(isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['business_name'])){
		
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		$business_name = $_POST['business_name'];
		
		
		$query = "SELECT COUNT(*) FROM product\n"
    . "INNER JOIN brand ON product.brand = brand.name\n"
    . "INNER JOIN model ON product.model = model.name\n"
	. "INNER JOIN business ON product.business = business.business_name\n"
    . "WHERE\n"
    . "brand.name='$brand'\n"
    . " AND model.name='$model'\n"
	. " AND business.business_name = '$business_name'";

		$result_count= 0;

		$result = $conn->query($query);

		while($row = $result->fetch_assoc())
		{
			$result_count = $result_count + $row['COUNT(*)'] ;
		}
		$result_string = (string)$result_count;
		$result=array();
		array_push($result, $result_string);
		
		echo json_encode($result);
		
	}

?>