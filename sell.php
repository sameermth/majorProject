<?php
session_start();
include 'siteConfig.php';
include 'dbConfig.php';

	if(!isset($_SESSION['username']) || empty($_SESSION['username']))
	{
		header("location: ".HOME_URL."");
	}
	else
	{
		$business_name = $_SESSION['business_name'];
		$div = '<div class="row ">
					<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 text-center">
						<h5 class="brand-heading business-owner" style="color: #000">'.$business_name.' (SELL)</h5>
					</div>
					
				</div>';
	}

?>
<!doctype html>
<html lang="en" >
<head>

 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
<meta charset="utf-8">

<title>Untitled Document</title>
<!-- Bootstrap core CSS -->
    <link href="<?php echo HOME_URL.'/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo HOME_URL.'/vendor/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo HOME_URL.'/css/grayscale.min.css'?>" rel="stylesheet">

</head>

 <body id="page-top">
	
    <div class="row" style="margin-top: 15px;">
			<div class="col-lg-1 col-md-2 col-sm-2 col-xs-3 offset-lg-8 offset-md-6 offset-sm-4 offset-xs-3 text-center pull-right">
				<div class="logout-button text-center" style="margin-left: 15px;">
					<a type = "button" href="<?php echo HOME_URL; ?>/stock.php" class="btn btn-default btn-radius">STOCK</a>
				</div>
			</div>
			<div class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<div class="logout-button text-center">
					<a type = "button" href="<?php echo HOME_URL; ?>/manage.php" class="btn btn-default btn-radius">MANAGE</a>
				</div>
			</div>
			<div class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<div class="logout-button text-center">
					<a type = "button" href="<?php echo HOME_URL; ?>/logout.php" class="btn btn-default btn-radius">LOG OUT</a>
				</div>
			</div>
	</div>

    <!-- Intro Header -->
	<div class="bgclass">
			</div>
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
			<div class="row ">
				<div class="col-lg-12 mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<?php  
									if(isset($div)){
									echo $div;
									}
								?>
							</div>
							<div class="row text-center " style="display:block;" id="stock_form">
								<div class="card card-borderless col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2" style="margin-bottom: 5px;">
									<div class="card-body">
										<div class="card-title">
											<h5 id="card-title">Customer Details</h5>
										</div>
										<form class="form" id="customer-search-form">
											<div class="row">
												<div class="col-md-4 offset-3 form-group ">
													<div class="form-group text-center">
														<label for="customer-id">Search Customer</label>
														<input type="text" id="customer-id" placeholder="Customer ID or Phone No" class="form-control"></input>
														<span id="error-zone" style="color: red;"></span>
													</div>
												</div>
												<div class="col-md-2 form-group">
													<div class="form-group text-center" style="margin-top: 25px;">
														<button type="button" onclick="searchcustomer($('#customer-id').val())" class="btn btn-default btn-radius form-control" style="line-height: 30px;"> SEARCH </button>
													</div>
												</div>
											</div>
										</form>
										<div id="customer-detail" style="display: none;">
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6>Customer ID:</h6>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6 id="customer-id1"></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6>Name:</h6>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6 id="customer-name"></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6>Email:</h6>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6 id="customer-email"></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6>Mobile:</h6>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6 id="customer-mobile"></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6>Address:</h6>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="text-center">
														<div class="form-group">
															<h6 id="customer-address"></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-1 col-md-2 col-sm-2 col-xs-3 offset-lg-5 offset-md-6 offset-sm-5 offset-xs-5 text-center">
												<div class="logout-button text-center">
													<a type = "button" class="btn btn-default btn-radius" onclick="order()">Create Order</a>
												</div>
											</div>
										</div>
										
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
      </div>
    </header>
	<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">
											<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title" style="color: black">Order</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>
							  <div class="modal-body">
							  <div class="row">
								<div class="col-md-1 offset-md-10 col-lg-1 offset-lg-10 col-sm-1 offset-sm-10" >
									<a href="#" type="button" class="btn btn-add" style="position: fixed" onclick="addrow()"><i class="fa fa-plus"></i></a>
								</div>
							  </div>
							  <div style="width : 1500px; margin-top: 35px">
								
								<form role="form" method="get" action="order.php"  id="modal_stock_form">
								
									<div id="form-element1" class="copy-row">
										<div class="row">
											<div class="form-group">
												<input type="text" name="serial1" placeholder="Enter Serial Number" class="form-name form-control" id="modal-serial1">
											</div>
											<div class="form-group">
												<select name="category1" class="form-control" id="modal-category1">
															<option value="0">Select Category</option>
															<?php echo $options_category; ?>
												</select>
											</div>
											<div class="form-group">
												<select name="brand1" class="form-control" id="modal-brand1" onchange="populateModels(this.value , 'modal', 'modal-model')">
															<option value="0">Select Brand</option>
															<?php echo $options; ?>
														</select>
											</div>
											<div class="form-group">
												<select name="model1" class="form-control" id="modal-model1">
															<option value="0" id="model_option_1">Select Model</option>
														</select>
											</div>
											<div class="form-group">
												<input type="text" name="mp1" placeholder="Enter Rate" class="form-name form-control" id="modal-mp1">
											</div>
											<div class="form-group">
												<input type="text" name="tax1" placeholder="Enter Rate" class="form-name form-control" id="modal-tax1">
											</div>
											<div class="form-group">
												<input type="hidden" name="status1" class="form-name form-control" id="status1" value="sold">
											</div>
										</div>
									</div>
									<div class="form-group">
												<input type="hidden" name="business" class="form-name form-control" id="business" value="<?php echo $business_name; ?>">
									</div>
									<div class="form-group">
												<input type="hidden" name="count" class="form-name form-control" id="count" value="1">
									</div>
									
									<button type="submit" class="btn btn-default btn-black" id="modal-add-stock" name="addstock">Add</button>
								</form>
								</div>
							  </div>
							  <div class="modal-footer">
								
								<button type="button" class="btn btn-default btn-black" data-dismiss="modal">Close</button>
							  </div>
							</div>
						</div>
					</div>
					


	<script>
		var count=1;
		
		function searchcustomer(id){
			$.ajax({type: "post", url:"searchcustomer.php", data: ({customer_id: id}), datatype: "json",
			success: function(data){
						var customer_detail = $.parseJSON(data);
						
						if(customer_detail == null)
						{
							$('#error-zone').html("Enter correct customer ID or Enter Mobile");
						}
						else{
							$('#error-zone').html("");
							$('#customer-search-form').hide();
							$('#customer-id1').html(customer_detail['customer_id']);
							$('#customer-name').html(customer_detail['name']);
							$('#customer-email').html(customer_detail['email']);
							$('#customer-mobile').html(customer_detail['mobile']);
							$('#customer-address').html(customer_detail['address']);
							sessionStorage.setItem("customer_id", customer_detail['customer-id']);
							$('#customer-detail').show();
						}
			},
			error: function(data){
				$('#error-zone').html(data);
			}
			});
		}
		
		function order(){
			$('#customer-search-form').hide();
			$('#customer-detail').hide();
			$('#order-form').show();
			$('#card-title').html("Order");
		}
		
		function addrow(){
								var num = $('.copy-row').length; 
								var newNum = new Number(num+1);
								
								var newElem = $('#form-element'+num).clone().attr('id', 'form-element'+newNum);
								newElem.find('#serial'+num).attr('id', 'modal-serial'+newNum).attr('name','serial'+newNum).val("");
								newElem.find('#mp'+num).attr('id', 'modal-mp'+newNum).attr('name','mp'+newNum).val("");
								newElem.find('#tax'+num).attr('id', 'modal-tax'+newNum).attr('name','tax'+newNum).val("");
								newElem.find('#status'+num).attr('id', 'status'+newNum).attr('name','status'+newNum);
								count++;
								$('#count').val(count);
								$('#form-element'+num).after(newElem);
							}
	
	</script>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
	<script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>">
    </script>

  </body>
</html>