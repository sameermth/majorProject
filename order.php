<?php

session_start();

include 'dbConfig.php';
include 'siteConfig.php';
	
	$grandtotal = 0;
	$queryvalue = "SELECT value, date from customercount;";
	$result = $conn->query($queryvalue);
	$row = $result->fetch_assoc();
	$var = $row['value'];
	$olddate = $row['date'];
	if($olddate < date("Y-m-d"))
	{
		$queryupdatevalue = "UPDATE customercount SET value=1;";
		$result = $conn->query($queryupdatevalue);
	}
	if(isset($_GET['count'])){
		
		$count    		= $_GET['count'];
		$business 		= $_GET['business'];
		$customer_id 	= $_GET['customer'];
		
		$serial   = array();
		
		for($i = 1 ; $i <= $count ; $i++)
		{
			array_push($serial,    	 	$_GET['serial'.$i]);
			
		}
		
		$customerdetail = '';
		$businessdetail = '';
		
		$query_customer_detail = "SELECT name, email, mobile, address FROM customer WHERE customer_id = '$customer_id';";
		$result_customer = $conn->query($query_customer_detail);
		$row_customer = $result_customer->fetch_assoc();
		$customerdetail = $row_customer['name']."<br>".$row_customer['email'].",".$row_customer['mobile']."<br>".$row_customer['address'];
		
		$query_business_detail = "SELECT business_address, business_mobile FROM business WHERE  business_name = '$business';";
		$result_business = $conn->query($query_business_detail);
		$row_business = $result_business->fetch_assoc();
		$businessdetail = $business."<br>".$row_business['business_address']."<br>".$row_business['business_mobile'];
		
		
		$detail = array();
		$rate   = array();
		$tax     = array();
		
		for($i=0 ; $i< $count; $i++)
		{
			$query = "SELECT brand, model, business, MP, tax from product WHERE serial_number = '$serial[$i]' AND business = '$business';";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			$temp = $row['brand']." ".$row['model']."<br>".$serial[$i];
			array_push($detail, $temp);
			array_push($rate, $row['MP']);
			array_push($tax, $row['tax']);
		}
		$billdate = date("Y/m/d");
		$billid = date("Ymd").$var;
		$var++;		
		$tr ='';
		for($i=0; $i<$count; $i++)
		{
			$taxamount = (($tax[$i] / 100)*$rate[$i]);
			
			$total = $rate[$i]+$taxamount;
			$tr.='
					<tr>
						<td style="padding : 5 5 5 5;">'.($i+1).'</td>
						<td style="padding : 5 5 5 5;">'.$detail[$i].'</td>
						<td style="padding : 5 5 5 5;">'.$rate[$i].'</td>
						<td style="padding : 5 5 5 5;">'.$taxamount.'</td>			
						<td style="padding : 5 5 5 5;">'.$total.'</td>
			
			';
			$grandtotal += $total;
			
		}
	}


?>

<html>
<head>
<title>Order Page</title>
</head>
<body>
<div align="center">
<h3> Invoice </h3>
</div>
<div align="right">
<h4><?php if(isset($billdate)) echo "date - ".$billdate; ?></h4>
</div>
<div align="right">
<h4><?php if(isset($billid)) echo "bill id - ".$billid; ?></h4>
</div>
<div align="left">
<h4><?php if(isset($customerdetail)) echo $customerdetail; ?></h4>
</div>
<span><?php if(isset($businessdetail)) echo $businessdetail; ?>
<table align="center" border="1">
<tr >
	<th style="padding : 5 5 5 5;">S. No.</th>
	<th style="padding : 5 5 5 5;">Product detail</th>
	<th style="padding : 5 5 5 5;">Rate</th>
	<th style="padding : 5 5 5 5;">Tax</th>
	<th style="padding : 5 5 5 5;">Total</th>
<tr>
<?php if(isset($tr)) echo $tr; ?>
<tr>
<td colspan="4">
	<div align="right">
		<h6> Grand Total </h6>
	</div>
</td>
<td>
	<?php if(isset($grandtotal)) echo $grandtotal; ?>
<td>
</tr>
	
</table>
<br>
<br>
<br>
<br>
<div align="right">
	<h6>Proprieter</h6>
</div>
</body>
</html>

