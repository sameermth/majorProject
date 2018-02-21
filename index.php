<?php
	session_start();
	include 'siteConfig.php';
	$error_username='';
	$error_mobile = '';
	$error_email = '';
	$div_success = '';
	
	if(isset($_SESSION['username_error']))
	{
		
		$error_username='<span style="color: red;">
						'.$_SESSION['username_error'].' already exist, choose another.
						</span>';
						unset($_SESSION['username_error']);
	}
	if(isset($_SESSION['mobile_error']))
	{
		$error_mobile='<span style="color: red;">
						'.$_SESSION['mobile_error'].' , enter again.
						</span>';;
						unset($_SESSION['mobile_error']);
	}
	if(isset($_SESSION['email_error']))
	{
		$error_email='<span style="color: red;">
						'.$_SESSION['email_error'].' , choose another.
						</span>';;
						unset($_SESSION['email_error']);
	}
	
	if((isset($error_username) && !empty($error_username))||(isset($error_mobile) && !empty($error_mobile))||(isset($error_email) && !empty($error_email))){
		$display= " ";
	}
	else
		$display = "none";
	
	if(isset($_SESSION['success']))
	{
		$div_success = '<div class="row">
							<div class="col-lg-4 offset-lg-4 text-center col-md-4 offset-md-4 col-sm-6 offset-sm-3">
								<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$_SESSION['success'].'</div>
							</div>
						</div>';
						unset($_SESSION['success']);
							
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
		<?php if(isset($div_success) && !empty($div_success)){
			echo $div_success;
		}
		?>
			<div class="row ">
				<div class="col-lg-8 mx-auto">
					<h2> Welcome to </h2>
					<h1 class="brand-heading">ERP Light</h1>
				</div>
			</div>
			<div class="row" id="register-login-button" <?php if((isset($error_username) && !empty($error_username))||(isset($error_mobile) && !empty($error_mobile))||(isset($error_email) && !empty($error_email))) echo "style=\"display: none;\"";?> >
					<div class="col-md-1 offset-md-3 " id="login-button-text" style="display: block;">
						<h4 >Login</h4>
					</div>
					<div class="col-md-1 ">
							<a href="javascript:void(0)" id="login-button" style="display: block;" class="btn btn-circle" onclick="loginButton()"><i class="fa fa-angle-double-down animated"></i></a>
					</div>
					<div class="col-md-1  offset-md-2 col-xs-6 offset-xs-3" id="register-button-text" style="display: block;">
						<h4 >Register</h4>
					</div>
					<div class="col-md-1	">
						<a href="#" id="register-button" style="display: block;" class="btn btn-circle " onclick="registerButton();"><i class="fa fa-angle-double-down animated"></i></a>
					</div>
			</div>
			<div class="row" id="login-form" style="display: none;">
			
                <div class="col-md-12 col-lg-12 ">
						<form role="form" action="<?php echo HOME_URL.'/login.php' ?>" method="post" class="login-form">
							<div class="row">
							
								<div class="form-group col-md-4 col-xs-4 offset-xs-2 offset-md-4">
									<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
								</div>
								
							</div>
							<div class="row">
								<div class="form-group col-md-4 col-xs-4 offset-xs-2 offset-md-4">
									<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
								</div>
							</div>
							<div class="row">
							<div class="col-md-3 offset-md-4 text-center">
								<button type="submit" class="btn btn-circle btn-submit" name = "signin"><i class="fa fa-check"></i></button>
								<button type="button" class="btn btn-circle" id="button-cancel" onclick="cancelLogin()"><i class="fa fa-close"></i></button>
							</div>
							</div>
						</form>
							
		            </div>
				</div>
				
			</div>
			<div class="row" id="registration-form" style="display: <?php if(isset($display)) echo $display; ?>;">
                <div class="col-md-4  offset-4">
						<form role="form" action="<?php echo HOME_URL.'/register.php' ?>" method="post" class="login-form">
								<div class="offset-11"><button id="cancel-register" type="button" class="btn btn-circle" onclick="cancelRegister()"><i class="fa fa-close"></i></button></div>
								<div class="form-group">
									<input type="text" name="Name" placeholder="Enter Name..." class="form-name form-control" id="form-name">
								</div>
								<div class="form-group">
									<input type="text" name="username" placeholder="Enter a Username..." class="form-username form-control" id="form-username">
									<?php if(isset($error_username) && !empty($error_username)) echo $error_username; ?>
								</div>
								<div class="form-group">
									<input type="email" name="email" placeholder="Enter email..." class="form-email form-control" id="form-email">
									<?php if(isset($error_email) && !empty($error_email)) echo $error_email; ?>
								</div>
								<div class="form-group">
									<input type="password" name="password" placeholder="Enter Password..." class="form-password form-control" id="form-password">
								</div>
								<div class="form-group">
									<input type="password" name="passwordCheck" placeholder="Enter Password Again..." class="form-password form-control" id="form-passwordCheck">
								</div>
								<div class="form-group">
									<input type="tel" name="mobile" placeholder="Enter Mobile Number..." class="form-mobile form-control" id="form-mobile">
									<?php if(isset($error_mobile) && !empty($error_mobile)) echo $error_mobile; ?>
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
			document.getElementById("register-login-button").style.display = "";
			document.getElementById("login-form").style.display = "none";
		}
		function cancelRegister(){
			document.getElementById("register-login-button").style.display = "";
			document.getElementById("registration-form").style.display = "none";
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
