<?php
session_start();
include 'siteConfig.php';
include 'dbConfig.php';


$business_name    = '';
$options          = '';
$options_category = '';

if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
	header("location: ".HOME_URL."");
}
else
{
	$business_name = $_SESSION['business_name'];
	$div = '<div class="row ">
				<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 text-center">
					<h2 class="brand-heading business-owner" style="color: #000">'.$business_name.' (STOCK)</h2>
				</div>
				
			</div>';
}

if(isset($business_name) && !empty($business_name)){
$query_total_stock = "SELECT COUNT(*) FROM product INNER JOIN business on product.business = business.business_name where business.business_name='$business_name';";
$result_total_stock = $conn->query($query_total_stock);
$row_total_stock = $result_total_stock->fetch_assoc();

$query_brand = "SELECT name FROM brand ORDER BY name;";
$brand_result = $conn->query($query_brand);

while( $row_brand = $brand_result->fetch_assoc() ){
		$options .= '<option value="'.$row_brand['name'].'">'.$row_brand['name'].'</option>';	
		}


$query_category = "SELECT name from category ORDER BY name";
$category_result = $conn->query($query_category);

while($row_category = $category_result->fetch_assoc()){
	$options_category .= '<option value="'.$row_category['name'].'">'.$row_category['name'].'</option>';	
}
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
	
	<!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
	<script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>">
    </script>

</head>
<body id="page-top">

    
	<div class="row" style="margin-top: 15px;">
		<div class="col-lg-1 col-md-3 col-sm-4 col-xs-6 offset-lg-10 offset-md-9 offset-sm-8 offset-xs-6 text-center">
		<div class="logout-button text-center">
			<a type = "button" href="<?php echo HOME_URL; ?>/logout.php" class="btn btn-default btn-radius">Log Out</a>
		</div>
		</div>
	</div>
    <!-- Intro Header -->
	<div class="bgclass">
			</div>
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
			
			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<?php  
							if(isset($div)){
							echo $div;
							}
						?>
					</div>
					<div class="row">
						<div class="col-lg-1 col-md-2 col-sm-3  offset-lg-10 offset-md-9 offset-sm-8 pull right">
							<button type="button" class="btn btn-default btn-radius" id="add_stock" data-toggle="modal" data-target="#myModal">ADD STOCK</button>
						</div>
					</div>

						<div class="row">
						<div class="col-lg-4 offset-lg-2 col-md-5 offset-1 col-sm-5 offset-sm-1">
							<h4>Total Available Stock</h4>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<h4> <?php if(isset($row_total_stock['COUNT(*)'])) echo $row_total_stock['COUNT(*)']; ?></h4>
						</div>
			.		</div>
					<div class="row text-center " style="display:block;" id="stock_form">
						<div class="card card-borderless col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2" style="margin-bottom: 5px;">
							<div class="card-body">
								<div class="card-title">
									<h5>Check Stock</h5>
								</div>
								<form class="form" method="post" action="">
									<div class="row">
										<div class="col-md-4 offset-1 form-group ">
											<div class="form-group text-center">
												<label>Brand</label>
												<select name="brand" class="form-control" id="brand_options" onchange="populateModels(this.value);">
													<option value="0">Select Brand</option>
													<?php echo $options; ?>
												</select>
											</div>
										</div>
										<div class="col-md-4 offset- form-group ">
											<div class="form-group text-center">
												<label>Model</label>
												<select name="model" class="form-control" id="model_options">
													<option value="0" id="model_option_1">Select Model</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 form-group " style="top: 30px;">
											<div class="form-group text-center" >
												<button type="button" name="search_stock" class="btn btn-default btn-radius" onclick="checkStock($('#brand_options').val(),$('#model_options').val());" >Search</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row text-center " style="display:none;" id="stock_card">
						<div class="card card-borderless col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2" style="margin-bottom: 5px;">
							<div class="card-body">
								<div class="card-title">
									<div class="row">
										<div class="col-md-9 col-lg-9 col-sm-9">
										<h5>Available Stock</h5>
										</div>
										<div class="col-md-3 col-lg-3 col-sm-3">
											<a href="#" class="btn btn-default btn-radius btn-borderless" onclick="showStockForm();">X</a>
										</div> 
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-lg-4 col-sm-4" id="available_stock_brand">
									</div>
									<div class="col-md-4 col-lg-4 col-sm-4" id="available_stock_model">
									</div>
									<div class="col-md-4 col-lg-4 col-sm-4" id="available_stock">
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
	<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">
											<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title" style="color: black">ADD STOCK</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>
							  <div class="modal-body">
							  <div class="row">
								<div class="col-md-1 offset-md-10 col-lg-1 offset-lg-10 col-sm-1 offset-sm-10">
									<a href="#" type="button" class="btn btn-add" ><i class="fa fa-plus"></i></a>
								</div>
							  </div>
								<form role="form" action="" method="post" class="" id="modal_stock_form">
									<div class="form-group">
										<input type="text" name="serial" placeholder="Enter Serial Number" class="form-name form-control" id="modal-serial">
									</div>
									<div class="form-group">
										<select name="category" class="form-control" id="modal-category">
													<option value="0">Select Category</option>
													<?php echo $options_category; ?>
												</select>
									</div>
									<div class="form-group">
										<input type="text" name="brand" placeholder="Enter Serial Number" class="form-name form-control" id="modal-serial">
									</div>
									<div class="form-group">
										<input type="text" name="model" placeholder="Enter Serial Number" class="form-name form-control" id="modal-serial">
									</div>
								</form>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>
						</div>
					</div>
	<script type="text/javascript">
		function populateModels(brandName){
			$.ajax({ type: "post", url: "populateModels.php", data: ({brandName: brandName}), datatype: "json",
            success: function(data){
				var models = $.parseJSON(data);
				console.log(models);
                status = 'OK';
				var opt='';
				$.each(models, function(index, value) {
                        opt = opt + "<option value='"+value+"'>"+value+"</option>";
                    });
					
				$('#model_options').html(opt);
            },
            error: function(jqXHR, exception) { errorMySQL(jqXHR, exception); }
        });
		}
		
		function checkStock(brand, model){
			
			console.log(brand);
			console.log(model);
			var business = <?php if(isset($business_name)) echo json_encode($business_name); ?>;
			console.log(business);
			var data = {'brand':brand, 'model':model, 'business_name': business};
			$.ajax({
				type: "post",
				url : "checkStock.php",
				data: data,
				success: function(data){
					var count= $.parseJSON(data);
					console.log(data);
					var h4 = "<h4>"+count[0]+"</h4>";
					$('#available_stock').html(h4);
					
				},
				error: function(stock, exception){ 
				console.log(stock);
				console.log(exception);
				}
			});
			
			document.getElementById("available_stock_brand").innerHTML = "<h4>"+brand+"</h4>";
			document.getElementById("available_stock_model").innerHTML = "<h4>"+model+"</h4>";
			
			document.getElementById("stock_form").style.display = "none";
			document.getElementById("stock_card").style.display = "block";
			
		}
		
		function showStockForm(){
			
			document.getElementById("stock_form").style.display = "block";
			document.getElementById("stock_card").style.display = "none";
			
		}
	
	</script>
 

  </body>
</html>