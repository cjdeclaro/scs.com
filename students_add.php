<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true")
	{
		header('Location: login.php');
	}

	$page = "students_add";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Add Student</title>
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

        <h3><i class="fa fa-angle-right"></i> Add New Student</h3>

        <form class="form-horizontal style-form" method="post" action="sql.php">

          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Personal Information</h4>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Student-Number</label>
                  <div class="col-sm-10">
                    <input name="studentnumber" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">LRN</label>
                  <div class="col-sm-10">
                    <input name="lrn" type="number" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input name="address" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input name="contactnumber" type="number" class="form-control" required>
                  </div>
                </div>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->

          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Academic Information</h4>
                <div class="form-group">
                  <label class="col-sm-2 col-xs-2 control-label">Grade</label>
                  <div class="col-sm-4 col-xs-4">
                    <input name="grade" type="number" class="form-control" required>
                  </div>
                  <label class="col-sm-2 col-xs-2 control-label">Section</label>
                  <div class="col-sm-4 col-xs-4">
                    <input name="section" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adviser</label>
                  <div class="col-sm-10">
                    <input name="adviser" type="text" class="form-control" required>
                  </div>
                </div>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->

          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Medical Information</h4>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Blood Type (optional)</label>
                  <div class="col-sm-4 col-xs-10">
                    <input name="bloodtype" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Parent's Name</label>
                  <div class="col-sm-10">
                    <input name="parentsname" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Parent's Number</label>
                  <div class="col-sm-10">
                    <input name="parentsnumber" type="number" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Allergens (optional)</label>
                  <div class="col-sm-10">
                    <textarea name="allergens" rows="3" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div><!-- col-lg-12-->
          </div><!-- /row -->

          <div class="row">
            <div class="col-xs-12" style="text-align:right">
              <a type="button" href="students.php" class="btn btn-default">
                Cancel
              </a>
              <button type="submit" name="btnaddstudent" class="btn btn-success">
                Add Student
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