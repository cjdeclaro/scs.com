<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true")
	{
		header('Location: login.php');
	}

	$page = "dashboard";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Dashboard</title>
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

        <div class="row">
          <div class="col-lg-12 main-chart">

            <div class="row mtbox">
              <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                  <span class="li_heart"></span>
                  <h3>
                    <?php
                      $countQuery = "SELECT COUNT(ID) AS `count` FROM `students`";
                      $countResult = getResult($countQuery);
                      if (mysqli_num_rows($countResult) > 0){
                        while($countRow = mysqli_fetch_assoc($countResult)){
                          $count = $countRow['count'];
                        }
                        echo $count;
                      }else{
                        echo '0';
                      }
                    ?>
                  </h3>
                </div>
                <p>Students Registered in the System</p>
              </div>
              <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                  <span class="li_cloud"></span>
                  <h3>
                    <?php
                      $countQuery = "SELECT COUNT(ID) AS `count` FROM `users`";
                      $countResult = getResult($countQuery);
                      if (mysqli_num_rows($countResult) > 0){
                        while($countRow = mysqli_fetch_assoc($countResult)){
                          $count = $countRow['count'];
                        }
                        echo $count;
                      }else{
                        echo '0';
                      }
                    ?>
                  </h3>
                </div>
                <p>System users with admin rights</p>
              </div>
              <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                  <span class="li_stack"></span>
                  <h3>
                    <?php
                      $countQuery = "SELECT COUNT(ID) AS `count` FROM `medical`";
                      $countResult = getResult($countQuery);
                      if (mysqli_num_rows($countResult) > 0){
                        while($countRow = mysqli_fetch_assoc($countResult)){
                          $count = $countRow['count'];
                        }
                        echo $count;
                      }else{
                        echo '0';
                      }
                    ?>
                  </h3>
                </div>
                <p>Check Ups conducted</p>
              </div>
              <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                  <span class="li_news"></span>
                  <h3>0</h3>
                </div>
                <p>Errors detected</p>
              </div>
              <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                  <span class="li_data"></span>
                  <h3>OK!</h3>
                </div>
                <p>The database is working properly.</p>
              </div>
            </div><!-- /row mt -->

          </div><!-- /col -->
        </div><!-- /row -->

      </section><!--wrapper-->
    </section><!--main-content-->

    <!--main content end-->

    <?php include 'footer.php'; ?>

  </section><!--container-->

  <?php include 'pagescripts.php'; ?>

</body>

</html>