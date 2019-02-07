<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true")
	{
		header('Location: login.php');
	}

	if(isset($_GET['id'])){
  }else{
    header('Location: students.php');
  }

  $studentinfoQuery = "SELECT * FROM `students` WHERE studentnumber='".$_GET['id']."'";
  $studentinfoResult = getResult($studentinfoQuery);

  if (mysqli_num_rows($studentinfoResult) == 0){
    header('Location: students.php?message=student_doesnt_exist');
  }else{
    while($studentinfoRow = mysqli_fetch_assoc($studentinfoResult)){
      $name = $studentinfoRow['name'];
      $studentnumber = $studentinfoRow['studentnumber'];
    }
  }

	$page = "students_checkup";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Check Up</title>
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

        <h3><i class="fa fa-angle-right"></i> Check Up for <?php echo $name ?></h3>

        <form class="form-horizontal style-form" method="post" action="sql.php">

          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Medical Form</h4>
                <div class="form-group">
                  <label class="col-xs-2 control-label">Date (dd/mm/yyyy)</label>
                  <div class="col-xs-4">
                    <input name="date" type="date" class="form-control" required>
                  </div>
                  <label class="col-xs-2 control-label">Time in</label>
                  <div class="col-xs-4">
                    <input name="time" type="time" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-2 control-label">Age</label>
                  <div class="col-xs-4">
                    <input name="age" type="number" class="form-control" required>
                  </div>
                  <label class="col-xs-2 control-label">Weight (optional)</label>
                  <div class="col-xs-4">
                    <input name="weight" type="text" class="form-control">
                  </div>
                </div>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->

          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Medical Results</h4>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Symptoms</label>
                  <div class="col-sm-10">
                    <textarea name="symptoms" rows="3" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Diagnosis</label>
                  <div class="col-sm-10">
                    <input name="diagnosis" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Medication Given</label>
                  <div class="col-sm-10">
                    <textarea name="medicationgiven" rows="3" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-2 control-label">Follow-up Date (optional)</label>
                  <div class="col-xs-4">
                    <input name="followupdate" type="date" class="form-control">
                  </div>
                  <label class="col-xs-2 control-label">Time out (optional)</label>
                  <div class="col-xs-4">
                    <input name="timeout" type="time" class="form-control">
                  </div>
                </div>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->

          <div class="row">
            <div class="col-xs-12" style="text-align:right">
              <a type="button" href="students_info.php?id=2015-00227-ST-0" class="btn btn-default">
                Cancel
              </a>
              <button name="studentmedical" value="<?php echo $studentnumber ?>" type="submit" class="btn btn-success">
                Save
              </button>
            </div>
          </div>

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