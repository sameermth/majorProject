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
	
	print_r($result_business_name);
	
	while($row_business_name = $result_business_name->fetch_assoc())
	{
		$div.='<div class="card">
				<div class="card-header">
				'.$row_business_name['business_name'].'
				</div>
				<div class="card-body">
					<a href"#" class="btn btn-default">Login</a>
				<div>
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

    

    <!-- Intro Header -->
	<div class="bgclass">
			</div>
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
			<div class="row ">
				<div class="col-lg-2 ">
					<h2 class="welcome"> Welcome,</h2>
				</div>
				<div class="col-lg-4 ">
					<h1 class="brand-heading" id="business-owner" ><?php if(isset($name) && !empty($name)) echo $name; ?></h1>
				</div>
				<div class="col-lg-4 offset-lg-2">
				<div class="card card-default card-business">
					<div class="card-header">Your Businesses
					</div>
					<div class="card-body">
						<?php if(isset($div)) echo $div; ?>
					</div>
				</div>
			</div>
				
		</div>
	</div>
	
	</div>
</header>

 <!-- Bootstrap core JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo HOME_URL.'/vendor/bootstrap/js/bootstrap.min.js'?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo HOME_URL.'/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>"></script>
	
	</body>
	</html>