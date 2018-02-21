<?php
session_start();
include 'siteConfig.php';
include 'dbConfig.php';

if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
	header("location: ".HOME_URL."");
}

if(isset($_POST['business_login']))
{
	$business_name = $_POST['business_name'];
	$_SESSION['business_name'] = $business_name;
	$div = '<div class="row ">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 text-center">
					<h2 class="brand-heading business-owner">'.$business_name.'</h2>
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

    

    <!-- Intro Header -->
	<div class="bgclass">
			</div>
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
			<?php if(isset($div)){
				echo $div;
			}
			?>
			<div class="row" >
					
					<div class="col-md-4 text-center">
							<a href="stock.php"  style="display: block; margin: 0 0 0 20%;"  class="btn-circle btn-circle-second text-center">stock</a>
					</div>
					
					<div class="col-md-4 text-center">
						<a href="#"  style="display: block;margin: 0 0 0 20%;"  class="btn-circle btn-circle-second text-center">sell</a>
					</div>
                    
					<div class="col-md-4 text-center">
						<a href="#"  style="display: block; margin: 0 0 0 20%; "  class="btn-circle btn-circle-second text-center" >manage</a>
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
	<script src="<?php echo HOME_URL.'/js/grayscale.min.js'?>">
    </script>

  </body>
</html>