<?php
	session_start();
	include 'dbConfig.php';
	include 'siteConfig.php';
	
	if(isset($_POST)){
		
		$customer_id = $_POST['customer_id'];
		$business    = $_POST['business'];
		$billdate    = $_POST['billdate'];
		$billid      = $_POST['billid'];
		$billamount  = $_POST['billamount'];
		$serials     = $_POST['serials'];
		
		$error = '';
		
		
		foreach($serials as $s){
			
			$query = "INSERT INTO orders SET product_serial = '$s', customer_id = '$customer_id', bill = '$billid';";
			$result = $conn->query($query);
			if($result === true)
				$error = '';
			else{
				$error = "Some error occured while inserting data into order";
				break;
			}
			
			$query2 = "UPDATE product SET availability = \"SOLD\" WHERE serial_number = '$s';";
			$result2 = $conn->query($query2);
			
			if($result2 === true)
				$error='';
			else{
				$error = "some error occured while updating product status";
				break;
			}
		}
		
		$query_bill = "INSERT INTO bill SET id = '$billid', date='$billdate', business='$business',customer='$customer_id', amount = '$billamount';";
		$result_bill = $conn->query($query_bill);
		
		$conn -> query("UPDATE customercount SET value = value+1;");
		
		if($result_bill === true)
			$error = '';
		else
			$error = "Some error occured while insering data into bill";
		
		
		if($error == '')
			echo "Success";
		else
			echo $error;
		
		
		
	}

?>