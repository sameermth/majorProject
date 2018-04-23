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
		$date = date("Y-m-d");
		$queryupdatevalue = "UPDATE customercount SET value=1, date = '$date' ;";
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
		$customerdetail = $row_customer['name']."<br>".$row_customer['email']."<br>".$row_customer['mobile']."<br>".$row_customer['address'];
		
		$query_business_detail = "SELECT business_address, business_mobile FROM business WHERE  business_name = '$business';";
		$result_business = $conn->query($query_business_detail);
		$row_business = $result_business->fetch_assoc();
		$businessdetail = $business."<br>".$row_business['business_address']."<br>".$row_business['business_mobile'];
		
		
		$detail = array();
		$rate   = array();
		$tax     = array();
		
		for($i=0 ; $i< $count; $i++)
		{
			$query = "SELECT brand, model, business, MP, tax from product WHERE serial_number = '$serial[$i]' AND business = '$business' AND availability = \"available\";";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			if(empty($row['brand']) && empty($row['model']))
				$temp = "Item Sold";
			else
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
						<td style="padding : 15 5 5 5;">'.($i+1).'</td>
						<td style="padding : 10 5 5 5;">'.$detail[$i].'</td>
						<td style="padding : 10 30 5 30;">'.$rate[$i].'</td>
						<td style="padding : 10 30 5 30;">'.$taxamount.'</td>			
						<td style="padding : 10 5 5 5;">'.$total.'</td>
			
			';
			$grandtotal += $total;
			
		}
		
		
	}


?>

<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Page</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo HOME_URL.'/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo HOME_URL.'/vendor/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo HOME_URL.'/css/grayscale.min.css'?>" rel="stylesheet">
</head>
<body>
<header class="masthead">
  <div class="intro-body">
	<div class="container">
	<div class="card font-white">
		<div class="card-body">
			<div class="card-title">
				<h3> Invoice </h3>
			</div>
			<div class="row">
				<div class="col-md-3 offset-2">
					<div >
						<?php if(isset($billdate)) echo "Date : ".$billdate; ?>
					</div>
				</div>
				<div class="col-md-3 offset-2">
					<div >
						<?php if(isset($billid)) echo "Bill ID :".$billid; ?>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3 offset-2">
					<div>
						Customer:<br>
						<?php if(isset($customerdetail)) echo $customerdetail; ?>
					</div>
				</div>
				<div class="col-md-3 offset-2">
					<div>
						Seller :<br>
						<?php if(isset($businessdetail)) echo $businessdetail; ?>
					</div>
				</div>
			</div>
			<br>
			<br>
			
					
			<table align="center" style="max-width: 600px;">
				<tr>
					<td style="padding : 5 5 5 5;">S. No.</td>
					<td style="padding : 5 5 5 5;">Product detail</td>
					<td style="padding : 5 30 5 30;">Rate</td>
					<td style="padding : 5 30 5 30;">Tax</td>
					<td style="padding : 5 5 5 5;">Total</td>
				</tr>
				<?php if(isset($tr)) echo $tr; ?>
				</tr>
				<tr >
					<td colspan="4" style="padding: 30px;">
						<div align="right">
							Grand Total
						</div>
					</td>
					<td>
						<?php if(isset($grandtotal)) echo $grandtotal; ?>
					</td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col-md-3 offset-7">
					<h6>Proprieter</h6>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-4">
				<form id="amount-form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="amount-paid">Amount Paid</label>
								<input type="text" class="form-group form-control" id="amountPaid" Placeholder = "Enter Paid Amount" name="paid_amount" />
							</div>
						</div>
						<div class="col-md-2 offset-1" style="padding: 33px;">
							<button type="button" name="Print_bill" class="btn btn-default btn-radius" onclick="updateTable($('#amountPaid').val())">Print Bill </button>
						</div>
					</div>
				</form>
				</div>
			</div>
				
	</div>
</div>
<script>

	function updateTable(billamount){
		
		var customer_id   = "<?php echo $customer_id; ?>";
		var business      = "<?php echo $business; ?>";
		var billdate      = "<?php echo $billdate; ?>";
		var billid        = "<?php echo $billid; ?>";
		var serials       = <?php echo json_encode( $serial); ?>;
		
		$.ajax({type: "post", url: "updateSellTable.php", data: ({billamount: billamount, customer_id: customer_id, business: business, billdate: billdate, billid: billid, serials: serials}), datatype: "json",
		success: function(data){
			console.log(data);
			if(data == "Success")
			{
				$("#amount-form").hide();
				window.print();
				window.location = "http://localhost/majorProject/businessHome.php";
			}
			else
				alert(data);
		},
		error: function(data){
			alert(data);
		}			
		});
		
	}	

</script>
 <!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>></script>
</body>
</html>

