<?php
	session_start();

	include 'db.php';

	if($_SESSION['loggedin']!="true")
	{
		header('Location: login.php');
	}

	$page = "students";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Students</title>
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

        <h3><i class="fa fa-angle-right"></i> Students</h3>

        <?php
          if(isset($_GET['message'])){
            if($_GET['message']=="student_already_exist"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> Student already exist.
                </div>
              ';
            }else if($_GET['message']=="student_added"){
              echo'
                <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Hooray!</strong> Student successfully added!
                </div>
              ';
            }else if($_GET['message']=="student_added_error"){
              echo'
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> An error occured while adding data. Please contact tech support :(
                </div>
              ';
            }else if($_GET['message']=="student_doesnt_exist"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> The student is not yet in the database. Add their info using the \'Add New Student\' button below.
                </div>
              ';
            }else if($_GET['message']=="student_deleted"){
              echo'
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Succesfully Deleted the record.
                </div>
              ';
            }else if($_GET['message']=="student_deleted_error"){
              echo'
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Oh Snap!</strong> An error occured while deleting. Please contact tech support :(
                </div>
              ';
            }
          }
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb">
                  <i class="fa fa-angle-right"></i> Search Students
              </h4>
              <?php
                if(isset($_GET['search'])){
                  echo'
                  <form class="form-inline" role="form" method="GET">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" placeholder="Student Number" value="'.$_GET['search'].'" required>
                    </div>
                    <button type="submit" class="btn btn-theme">Search</button>
                    <a type="button" class="btn btn-default" href="students.php">Clear</a>
                    <a type="button" class="btn btn-warning" href="QR">Search using QR</a>
                    <a href="students_add.php" type="button" class="btn btn-success" value="">Add New Student</a>
                  </form>
                  ';
                }else{
                  echo'
                  <form class="form-inline" role="form" method="GET">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" placeholder="Student Number" required>
                    </div>
                    <button type="submit" class="btn btn-theme">Search</button>
                    <a type="button" class="btn btn-warning" href="QR">Search using QR</a>
                    <a href="students_add.php" type="button" class="btn btn-success" value="">Add New Student</a>
                  </form>
                  ';
                }
              ?>
            </div><!-- /form-panel -->
          </div><!-- /col-lg-12 -->
        </div><!-- /row -->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Students Information</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                      <th>Student No.</th>
                      <th>Name</th>
                      <th>Grade</th>
                      <th>Section</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(isset($_GET['search']))
                        $getstudentsQuery = "SELECT * FROM `students` WHERE `studentnumber` LIKE '%".$_GET['search']."%' ORDER BY `ID` DESC";
                      else
                        $getstudentsQuery = "SELECT * FROM `students` ORDER BY `ID` DESC";

                      $getstudentsResult = getResult($getstudentsQuery);

                      if (mysqli_num_rows($getstudentsResult) > 0){
                        while($getstudentsRow = mysqli_fetch_assoc($getstudentsResult)){
                          echo'
                          <tr>
                            <td data-title="Student No.">'.$getstudentsRow['studentnumber'].'</td>
                            <td data-title="Name">'.$getstudentsRow['name'].'</td>
                            <td data-title="Grade">'.$getstudentsRow['grade'].'</td>
                            <td data-title="Section">'.$getstudentsRow['section'].'</td>
                            <td data-title="">
                              <form method="GET" action="students_info.php">
                                <input name="id" value="'.$getstudentsRow['studentnumber'].'" type="hidden" />
                                <button type="submit" name="action" value="view" class="btn btn-info btn-xs">
                                  View
                                </button>
                              </form>
                            </td>
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