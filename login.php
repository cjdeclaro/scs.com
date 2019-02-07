<?php
	//Clear old sessions

	session_start();
	session_destroy();
	session_start();

	include 'db.php';

	$_SESSION['loggedin'] = " ";
	$_SESSION['adminerror'] = " ";
	$_SESSION['lname'] = " ";
	$_SESSION['fname'] = " ";
	$_SESSION['admin'] = "false";
	$_SESSION['username'] = "";
	$_SESSION['departmentid'] = "";

	// Webstat - to turn off the site - requires 'settings' table from db with 'WebsiteStatus' column

	$webstat = "Off";

	$statQuery = "SELECT * FROM `settings` WHERE name='WebsiteStatus' AND status='On'";
	$statresult = getResult($statQuery);

	if(mysqli_num_rows($statresult)==1){
		$webstat = "On";
	}

	// Login query - on button click

	if(isset($_POST['adminloginbtn'])){

		$username=$_POST['username'];
		$password=$_POST['password'];

		$logQuery = "SELECT * FROM `users` WHERE username = '".$username."' AND password = '".$password."'";
		$result = getResult($logQuery);

		$count = mysqli_num_rows($result);

		if (mysqli_num_rows($result) > 0){
			while($Row = mysqli_fetch_assoc($result)){

				//Initialize User Information (Save to Session)
				$_SESSION['loggedin'] = "true";
				$_SESSION['adminerror'] = " ";
				$_SESSION['lname'] = $Row['lname'];
				$_SESSION['fname'] = $Row['fname'];
				$_SESSION['usertype'] = $Row['usertype'];
				$_SESSION['username'] = $Row['username'];
				$_SESSION['password'] = $Row['password'];
			}
			header('Location: index.php'); // Go to landing page
		}
		else{
			header('Location: login.php?err=2?'); // show error
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

		<title>Clinic | Login</title>
		<link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
						<?php
						if($webstat=="On"){
							echo'
							<input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
							<br>
							<input name="password" type="password" class="form-control" placeholder="Password" required>
							<label class="checkbox">
								<span class="pull-right">
									<!--a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a-->
								</span>
							</label>
							<button class="btn btn-theme btn-block" name="adminloginbtn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
							';
							if(isset($_GET['err'])){
								if($_GET['err']==2){
									echo'
									<div class="container-login100-form-btn m-t-17">
										<p style="color:red">Authentication Failed: No user found</p>
									</div>
									';
								}
							}
						}
						else{
							echo'
							<p>Unavailable. Please contact controller</p>';
						}?>

							<!--div class="login-social-link centered">
								<p>or you can sign in via your social network</p>
									<button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
									<button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
							</div-->
							<!--div class="registration">
									Don't have an account yet?<br/>
									<a class="" href="#">
											Create an account
									</a>
							</div-->
		        </div>

						<!-- Modal -->
						<!--div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
								<div class="modal-dialog">
										<div class="modal-content">
												<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title">Forgot Password ?</h4>
												</div>
												<div class="modal-body">
														<p>Enter your e-mail address below to reset your password.</p>
														<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

												</div>
												<div class="modal-footer">
														<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
														<button class="btn btn-theme" type="button">Submit</button>
												</div>
										</div>
								</div>
						</div-->
						<!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>

