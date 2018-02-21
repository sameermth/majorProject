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
	$username = $_SESSION['username'];
	$q = "SELECT owner_name, username FROM OWNER where username = '$username';";
	$result = $conn->query($q);
	$row = $result->fetch_assoc();
	
	$name = $row['owner_name'];
	$username = $row['username'];
	
	$q1 = "SELECT business_name FROM business INNER JOIN owner ON business.business_owner = owner.username where owner.username = '$username';";
	
	$result_business_name = $conn->query($q1);
	$div ='';
	while($row_business_name = $result_business_name->fetch_assoc())
	{
		$div.='<div class="row" style="margin-bottom:10px!important;">
				<div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-md-4 offset-md-4 text-center" >
					<div class="card" >
						<div class="card-body" style="padding: 5 10 5 10;">
							<h5 class="card-title">'.$row_business_name['business_name'].'</h5>
							<a  href="#" style=" display:\"\";" class="btn btn-default btn-radius " id="login-button-'.trim( $row_business_name['business_name']).'" onClick="showLogin(\'login-button-'.trim( $row_business_name['business_name']).'\', \'business-login-form-'.trim($row_business_name['business_name']).'\');">LOGIN</a>
							
							<div class="row" id="business-login-form-'.trim($row_business_name['business_name']).'" style="display: none;">
								<form class="form" method ="post" action="businessHome.php" >
									<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 offset-lg-1 offset-md-1 offset-sm-1  form-group">
										<label for="password">Password</label>
										<input type="hidden" value="'.trim($row_business_name['business_name']).'" name="business_name"></input>
										<input type="password" placeholder="Enter Password....." name="business_password" class="form-group form-control"></input>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 text-center form-group" style="top: 30px;">
									<button type="submit" name="business_login" class="btn btn-circle btn-submit "><i class="fa fa-check"></i></button>
									</div>
									</div>
								</form>
							</div>							
						</div>
					</div>
				</div>
			</div>
			';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to ERP Lite</title>

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
			<div class="row ">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 ">
					<h2  >Welcome,</h2><h2 class="brand-heading business-owner"> <?php if(isset($name) && !empty($name)) echo $name; ?></h2>
				</div>
				
			</div>
			
			  <?php if(isset($div)) echo $div; ?>
				
		</div>
	
	
	</div>
</header>


  </div>
</div>
<script type="text/javascript">
	
	function showLogin(id1, id2){
		console.log(id1);
		console.log(id2);
		
		document.getElementById(id1).style.display = "none";
		document.getElementById(id2).style.display = "block";
		
		
	}
</script>

 <!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>"></script>
	
	</body>
	</html>