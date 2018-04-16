<?php
	include 'dbConfig.php';
	
	if(isset($_GET['count'])){
		
		$count    = $_GET['count'];
		$business = $_GET['business'];
		
		$serial   = array();
		$category = array();
		$brand    = array();
		$model    = array();
		$cp       = array();
		$mp       = array();
		$tax      = array();
		$availability   = array();
		
		for($i = 1 ; $i <= $count ; $i++)
		{
			array_push($serial,     $_GET['serial'.$i]);
			array_push($category,	$_GET['category'.$i]);
			array_push($brand, 		$_GET['brand'.$i]);
			array_push($model, 		$_GET['model'.$i]);
			array_push($cp, 		$_GET['cp'.$i]);
			array_push($mp, 		$_GET['mp'.$i]);
			array_push($tax, 		$_GET['tax'.$i]);
			array_push($availability,     $_GET['status'.$i]);
		}
		$values = '';
		for($i = 0; $i < $count; $i++)
		{
			if($count == 1)
				$values="('$serial[$i]', '$category[$i]', '$brand[$i]', '$model[$i]','$business', '$cp[$i]', '$mp[$i]','$tax[$i]', '$availability[$i]')";
			
			else if($i<$count-1)
				$values.="('$serial[$i]', '$category[$i]', '$brand[$i]', '$model[$i]','$business', '$cp[$i]', '$mp[$i]','$tax[$i]', '$availability[$i]'),";
			else if($i<$count)
				$values.="('$serial[$i]', '$category[$i]', '$brand[$i]', '$model[$i]','$business', '$cp[$i]', '$mp[$i]','$tax[$i]', '$availability[$i]');";
				
			
				
		}
		$query = "INSERT INTO product(serial_number,category,brand,model,business,cp,mp,tax,availability) VALUES";
		
		$query_final = $query.$values;
		
		echo $query_final;		
		$result = $conn->query($query_final);
		
		if($result === TRUE)
		{
			header("location: stock.php");
		}
}
?>