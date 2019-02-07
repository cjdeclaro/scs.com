<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true")
	{
		header('Location: login.php');
	}

	$page = "settings";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Account</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <script src="assets/js/chart-master/Chart.js"></script>
  <link href="assets/css/table-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <section id="container">

    <?php include 'topnav.php'; ?>

    <section id="main-content">
      <section class="wrapper">

        <h3><i class="fa fa-angle-right"></i> Settings</h3>

        <?php
          if(isset($_GET['message'])){
            if($_GET['message']=="credentials_wrong"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> The credentials you entered does not match!
                </div>
              ';
            }else if($_GET['message']=="passwords_doesnt_match"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> The passwords you entered does not match!
                </div>
              ';
            }else if($_GET['message']=="username_exist"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> The username you entered already exist!
                </div>
              ';
            }else if($_GET['message']=="error"){
              echo'
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> An error occured while updating! Please contact Tech Support :(
                </div>
              ';
            }else if($_GET['message']=="user_added"){
              echo'
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> The user was successfully added! Logout to login to new user.
                </div>
              ';
            }
          }
        ?>

        <form class="form-horizontal style-form" action="sql.php" method="POST">
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> New Administrative User</h4>
                <p>This will add a new user to the system</p>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">First Name:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="fname" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Last Name:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="lname" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Username:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="username" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Password:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="password" type="password" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Confirm Password:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="confirm_password" type="password" class="form-control" required>
                  </div>
                </div>
                <p>Enter credentials for <?php echo $_SESSION['fname']?> to continue:</p>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Your Username:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="myusername" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-1 col-xs-2 control-label">Your Password:</label>
                  <div class="col-lg-5 col-md-4 col-sm-8 col-xs-12">
                    <input name="mypassword" type="password" class="form-control">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning" name="newuser">Add New User</button>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->
        </form>

      </section>
      <!--wrapper-->
    </section>
    <!--main-content-->

    <!--main content end-->

    <?php include 'footer.php'; ?>

  </section>
  <!--container-->

  <?php include 'pagescripts.php'; ?>

</body>

</html>