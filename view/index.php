<?php
	include '../db.php';

  if(isset($_GET['id'])){
  }else{
    header('Location: error.php');
  }

  $studentinfoQuery = "SELECT * FROM `students` WHERE studentnumber='".$_GET['id']."'";
  $studentinfoResult = getResult($studentinfoQuery);

  if (mysqli_num_rows($studentinfoResult) == 0){
    header('Location: error.php');
  }else{
    while($studentinfoRow = mysqli_fetch_assoc($studentinfoResult)){
      $name = $studentinfoRow['name'];
			$studentnumber = $studentinfoRow['studentnumber'];
			$lrn = $studentinfoRow['LRN'];
      $address = $studentinfoRow['address'];
      $contactnumber = $studentinfoRow['contactnumber'];
      $grade = $studentinfoRow['grade'];
      $section = $studentinfoRow['section'];
      $adviser = $studentinfoRow['adviser'];
      $bloodtype = $studentinfoRow['bloodtype'];
      $parentsname = $studentinfoRow['parentsname'];
      $parentsnumber = $studentinfoRow['parentsnumber'];
      $allergens = $studentinfoRow['allergens'];
    }
	}

	$qr_content = 'Student-number:'.$studentnumber.'%0D%0AName:'.$name.'%0D%0AGrade:'.$grade.'%0D%0AAddress:'.$address.'%0D%0ABlood Type:'.$bloodtype.'%0D%0AAllergens:'.$allergens.'%0D%0AParent\'s Name:'.$parentsname.'%0D%0AParent\'s Number:'.$parentsnumber.'%0D%0ALRN:'.$lrn.'%0D%0A'.$domainname.'/view/?id='.$studentnumber;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Clinic | Information</title>
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">

  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/style-responsive.css" rel="stylesheet">

  <script src="../assets/js/chart-master/Chart.js"></script>
  <link href="../assets/css/table-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <section id="container" style="padding-left: 20px; padding-right: 20px">

		<div class="row">
			<div class="col-xs-12">
				<h3><i class="fa fa-angle-right"></i> <?php echo $name ?></h3>
			</div>
		</div>

		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-4 mb">
				<div class="weather-2 pn">
					<div class="weather-2-header">
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<p>PERSONAL INFORMATION</p>
							</div>
						</div>
					</div>
					<table class="table">
						<tr>
							<th>Student No:</th>
							<td><?php echo $studentnumber ?></td>
						</tr>
						<tr>
							<th>LRN:</th>
							<td><?php echo $lrn ?></td>
						</tr>
						<tr>
							<th>Address:</th>
							<td><?php echo $address ?></td>
						</tr>
						<tr>
							<th>Contact Number:</th>
							<td><?php echo $contactnumber ?></td>
						</tr>
						<tr>
							<th>QR Code:<br>(Click to enlarge)</th>
							<td>
								<a href="#qrcode" data-toggle="modal">
									<img src="https://api.qrserver.com/v1/create-qr-code/?size=50x50&data=<?php echo $qr_content?>">
								</a>
							</td>
						</tr>
					</table>
				</div>
			</div><!-- /col-md-4 -->

			<div class="col-lg-4 col-md-4 col-sm-4 mb">
				<div class="weather-2 pn">
					<div class="weather-2-header">
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<p>ACADEMIC INFORMATION</p>
							</div>
						</div>
					</div>
					<table class="table">
						<tr>
							<th>Grade:</th>
							<td><?php echo $grade ?></td>
						</tr>
						<tr>
							<th>Section:</th>
							<td><?php echo $section ?></td>
						</tr>
						<tr>
							<th>Adviser:</th>
							<td><?php echo $adviser ?></td>
						</tr>
					</table>
				</div>
			</div><!-- /col-md-4 -->

			<div class="col-lg-4 col-md-4 col-sm-4 mb">
				<div class="weather-2 pn">
					<div class="weather-2-header">
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<p>MEDICAL INFORMATION</p>
							</div>
						</div>
					</div>
					<table class="table">
						<tr>
							<th>Blood Type:</th>
							<td><?php echo $bloodtype ?></td>
						</tr>
						<tr>
							<th>Allergens:</th>
							<td>
								<a type="button" data-toggle="modal" href="#allergens" class="btn btn-info btn-xs">
									View
								</a>
							</td>
						</tr>
						<tr>
							<th>Parent's Name:</th>
							<td><?php echo $parentsname ?></td>
						</tr>
						<tr>
							<th>Parent's Number:</th>
							<td><?php echo $parentsnumber ?></td>
						</tr>
					</table>
				</div>
			</div><!-- /col-md-4 -->

		</div>
		<!--/END 1ST ROW OF PANELS -->

		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i> Medical History</h4>
					<section id="no-more-tables">
						<table class="table table-bordered table-striped table-condensed cf">
							<thead class="cf">
								<tr>
									<th>Date (YYYY-MM-DD)</th>
									<th>Time in</th>
									<th>Time out</th>
									<th>Age</th>
									<th>Weight</th>
									<th>Symptoms</th>
									<th>Diagnosis</th>
									<th>Medication Given</th>
									<th>Follow Up Date</th>
									<th>Clinician</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$studentmedicalQuery = "SELECT * FROM `medical` WHERE studentnumber='".$_GET['id']."' ORDER BY `date` DESC, `time` DESC";
								$studentmedicalResult = getResult($studentmedicalQuery);

								$count = 0;

								if(mysqli_num_rows($studentmedicalResult) > 0){
									while($studentmedicalRow = mysqli_fetch_assoc($studentmedicalResult)){
										$count += 1;
										echo'
										<tr>
											<td data-title="Date">'.$studentmedicalRow['date'].'</td>
											<td data-title="Time in">'.$studentmedicalRow['time'].'</td>
											<td data-title="Time out">'.$studentmedicalRow['timeout'].'</td>
											<td data-title="Age">'.$studentmedicalRow['age'].'</td>
											<td data-title="Weight">'.$studentmedicalRow['weight'].'</td>
											<td data-title="Symptoms">
												<a type="button" data-toggle="modal" href="#symptoms'.$count.'" class="btn btn-info btn-xs">
													View
												</a>
											</td>
											<td data-title="Diagnosis">'.$studentmedicalRow['diagnosis'].'</td>
											<td data-title="Medication Given">
												<a type="button" data-toggle="modal" href="#medication'.$count.'" class="btn btn-info btn-xs">
													View
												</a>
											</td>
											<td data-title="Follow Up date">'.$studentmedicalRow['followupdate'].'&nbsp;</td>
											<td data-title="Clinician">'.$studentmedicalRow['clinician'].'&nbsp;</td>
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

		<!-- Modals -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="qrcode" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">QR Code - <?php echo $name?></h4>
					</div>
					<div class="modal-body" align="center">
						<img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?php echo $qr_content ?>">
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="allergens" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Allergens</h4>
					</div>
					<div class="modal-body">
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Student Number</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $name ?></td>
									<td><?php echo $studentnumber ?></td>
								</tr>
							</tbody>
						</table>
						<table class="table">
							<thead>
								<tr>
									<th>Allergens</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $allergens ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>

		<?php
			$symptomsQuery = "SELECT * FROM `medical` WHERE studentnumber='".$_GET['id']."' ORDER BY `date` DESC, `time` DESC";
			$symptomsResult = getResult($symptomsQuery);

			$count = 0;

			if(mysqli_num_rows($symptomsResult) > 0){
				while($symptomsRow = mysqli_fetch_assoc($symptomsResult)){
					$count += 1;
		?>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="symptoms<?php echo $count ?>" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Symptoms</h4>
					</div>
					<div class="modal-body">
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $name ?></td>
									<td><?php echo $symptomsRow['date']?></td>
									<td><?php echo $symptomsRow['time']?></td>
								</tr>
							</tbody>
						</table>
						<table class="table">
							<thead>
								<tr>
									<th>Symptoms</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $symptomsRow['symptoms']?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>

		<?php
				}
			}
		?>

		<?php
			$medicationQuery = "SELECT * FROM `medical` WHERE studentnumber='".$_GET['id']."' ORDER BY `date` DESC, `time` DESC";
			$medicationResult = getResult($medicationQuery);

			$count = 0;

			if(mysqli_num_rows($medicationResult) > 0){
				while($medicationRow = mysqli_fetch_assoc($medicationResult)){
					$count += 1;
		?>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="medication<?php echo $count ?>" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Medication</h4>
					</div>
					<div class="modal-body">
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $name ?></td>
									<td><?php echo $medicationRow['date'] ?></td>
									<td><?php echo $medicationRow['time'] ?></td>
								</tr>
							</tbody>
						</table>
						<table class="table">
							<thead>
								<tr>
									<th>Medications Given</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $medicationRow['medicationgiven'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>

		<?php
				}
			}
		?>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleterecord" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#c9302c; color: white">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Confirm Delete</h4>
					</div>
					<form method="post" action="sql.php">
						<div class="modal-body">
							<p class="text-warning">Are you sure you want to delete the record?</p>
							<p class="text-danger">Enter password to continue</p>
							<div class="form-group has-warning">
								<div class="col-lg-12">
									<input type="password" class="form-control" name="password" required/>
								</div>
							</div>
							<hr>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
							<button class="btn btn-danger" name="deleterecord" value="<?php echo $studentnumber ?>" type="submit">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal -->

    <!--main content end-->

  </section>
  <!--container-->

  <?php include 'pagescripts.php'; ?>

</body>

</html>