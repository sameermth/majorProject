<?php

	include 'siteConfig.php';

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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    

    <!-- Intro Header -->
	<div class="bgclass">
			</div>
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
			<div class="row ">
				<div class="col-lg-8 mx-auto">
					<h2> Welcome to </h2>
					<h1 class="brand-heading">ERP Light</h1>
				</div>
			</div>
			<div class="row" id="register-login-button" >
					<div class="col-md-1 offset-3 " id="login-button-text" style="display: block;">
						<h4 >Login</h4>
					</div>
					<div class="col-md-1 ">
							<a href="javascript:void(0)" id="login-button" style="display: block;" class="btn btn-circle" onclick="loginButton()"><i class="fa fa-angle-double-down animated"></i></a>
					</div>
					<div class="col-md-1  offset-2" id="register-button-text" style="display: block;">
						<h4 >Register</h4>
					</div>
					<div class="col-md-1">
						<a href="#" id="register-button" style="display: block;" class="btn btn-circle " onclick="registerButton();"><i class="fa fa-angle-double-down animated"></i></a>
					</div>
			</div>
			<div class="row" id="login-form" style="display: none;">
                <div class="col-md-12 col-lg-12 ">
						<form role="form" action="<?php echo HOME_URL.'/login.php' ?>" method="post" class="login-form">
							<div class="row">
							
								<div class="form-group col-md-3 offset-3">
									<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
								</div>
								<div class="form-group col-md-3 md-offset-3">
									<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
								</div>
					
								<button type="submit" class="btn btn-circle" name = "signin" id="button-submit"><i class="fa fa-check"></i></button>
							</div>
						</form>
						<div class="col-md-1 offset-8">
							<button class="btn btn-circle" id="button-cancel" onclick="cancelLogin()"><i class="fa fa-close"></i></button>
						</div>
		            </div>
				</div>
			</div>
			<div class="row" id="registration-form" style="display: none;">
                <div class="col-md-4  offset-4">
						<form role="form" action="<?php echo HOME_URL.'/register.php' ?>" method="post" class="login-form">
								<div class="offset-11"><button id="cancel-register" class="btn btn-circle" onclick="cancelRegister()"><i class="fa fa-close"></i></button></div>
								<div class="form-group">
									<input type="text" name="Name" placeholder="Enter Name..." class="form-name form-control" id="form-name">
								</div>
								<div class="form-group">
									<input type="text" name="username" placeholder="Enter a Username..." class="form-username form-control" id="form-username">
								</div>
								<div class="form-group">
									<input type="email" name="email" placeholder="Enter email..." class="form-email form-control" id="form-email">
								</div>
								<div class="form-group">
									<input type="password" name="password" placeholder="Enter Password..." class="form-password form-control" id="form-password">
								</div>
								<div class="form-group">
									<input type="password" name="passwordCheck" placeholder="Enter Password Again..." class="form-password form-control" id="form-passwordCheck">
								</div>
								<div class="form-group">
									<input type="tel" name="mobile" placeholder="Enter Mobile Number..." class="form-mobile form-control" id="form-mobile">
								</div>
								<div class="form-group ">
									<input type="text" name="address" placeholder="Enter Your Address..." class="form-address form-control" id="form-address">
								</div>
					
								<button type="submit" class="btn btn-circle" name = "registration" id="button-submit"><i class="fa fa-check"></i></button>
							</div>
						</form>
		            </div>
				</div>
			</div>
      </div>
    </header>

   

    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <h6> &copy; Instacoders</h6>
      </div>
    </footer>
	
	<script type="text/javascript">
		function loginButton(){
			document.getElementById("register-login-button").style.display = "none";
			document.getElementById("registration-form").style.display = "none";
			document.getElementById("login-form").style.display = "block";
		}
		
		function registerButton(){
			document.getElementById("register-login-button").style.display = "none";
			document.getElementById("login-form").style.display = "none";
			document.getElementById("registration-form").style.display = "block";
		}
		function cancelLogin(){
			document.getElementById("register-login-button").style.display = "block";
			document.getElementById("login-form").style.display = "none";
		}
		function canceRegister(){
			document.getElementById("register-login-button").style.display = "block";
			document.getElementById("registration-form").style.display = "none";
		}
			
	</script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
