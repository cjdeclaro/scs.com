<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true"){
		header('Location: login.php');
	}

	$page = "medical_report";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Report</title>
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
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
            <h3><i class="fa fa-angle-right"></i> Medical Report</h3>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="text-align:right">
            <h3><a href="print_report.php" target="_blank" class="btn btn-success">Print</a></h3>
          </div>
        </div>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Medical History</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
											<th>Student Number</th>
											<th>Name</th>
											<th>Date (YYYY-MM-DD)</th>
                      <th>Time in</th>
                      <th>Time out</th>
                      <th>Age</th>
                      <th>Diagnosis</th>
                      <th>Medication Given</th>
                      <th>Follow Up Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $studentmedicalQuery = "SELECT * FROM `medical` ORDER BY `date` DESC, `time` DESC";
                    $studentmedicalResult = getResult($studentmedicalQuery);

                    if(mysqli_num_rows($studentmedicalResult) > 0){
                      while($studentmedicalRow = mysqli_fetch_assoc($studentmedicalResult)){

												$name = '';

												$studentnameQuery = "SELECT `name` FROM `students` WHERE studentnumber='".$studentmedicalRow['studentnumber']."'";
												$studentnameResult = getResult($studentnameQuery);

												if(mysqli_num_rows($studentnameResult) == 1){
                      		while($studentnameRow = mysqli_fetch_assoc($studentnameResult)){
														$name = $studentnameRow['name'];
													}
												}

                        echo'
												<tr>
													<td data-title="Date">'.$studentmedicalRow['studentnumber'].'</td>
													<td data-title="Date">'.$name.'</td>
                          <td data-title="Date">'.$studentmedicalRow['date'].'</td>
                          <td data-title="Time in">'.$studentmedicalRow['time'].'</td>
                          <td data-title="Time out">'.$studentmedicalRow['timeout'].'</td>
                          <td data-title="Age">'.$studentmedicalRow['age'].'</td>
                          <td data-title="Diagnosis">'.$studentmedicalRow['diagnosis'].'</td>
                          <td data-title="Medication Given">'.$studentmedicalRow['medicationgiven'].'</td>
                          <td data-title="Follow Up date">'.$studentmedicalRow['followupdate'].'&nbsp;</td>
                        </tr>
                        ';
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </section>
            </div><!-- /content-panel -->
          </div><!-- /col-lg-12 -->
        </div><!-- /row -->

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