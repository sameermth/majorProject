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
		$div.='<div class="col-lg-4 offset-lg-4 col-sm-6 text-center">
				<div class="card" style="margin: 10 10 10 10;">
				<div class="card-body" style="padding: 5 10 5 10;">
				<h5 class="card-title">'.$row_business_name['business_name'].'</h5>
				<button type="button" href="#" class="btn btn-default" data-toggle = "modal" data-target="#myModal">LOGIN</button>
				  </div>
				</div>
			</div>';
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
			
			<div class="row">
			  <?php if(isset($div)) echo $div; ?>
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
	  
		<h4 class="modal-title" style="color: #000">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        			<div class="row" id="login-form">
			
                <div class="col-md-12 col-lg-12 ">
						<p style="color: red;">Login with owner username and mailed password</p>
						<form role="form" action="<?php echo HOME_URL.'business_login.php' ?>" method="post" class="login-form">
							<div class="row">
							
								<div class="form-group col-md-8 col-xs-4 offset-xs-2 offset-md-2">
									<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username-business">
								</div>
								
							</div>
							<div class="row">
								<div class="form-group col-md-8 col-xs-4 offset-xs-2 offset-md-2">
									<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password-business">
								</div>
							</div>
							<div class="row">
							<div class="col-md-8 offset-md-2 text-center">
								<button type="submit" class="btn btn-circle" name = "signin" id="button-submit-business"><i class="fa fa-check"></i></button>
							</div>
							</div>
						</form>
							
		            </div>
				</div>
				
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>"></script>
	
	</body>
	</html>