<html>

<head>
  <title>Search Student via QR</title>
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

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

  <link href="../assets/css/table-responsive.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>CLINIC SYSTEM</b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a class="dropdown-toggle" onCLick="location.reload()">
              <i class="fa fa-refresh"></i>
              <!--span class="badge bg-theme">5</span-->
            </a>
          </li>
          <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <aside class="sidebar">
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <p class="centered"><a href="../account.php"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>

          <section class="cameras">
            <h2>Cameras</h2>
            <ul>
              <li v-if="cameras.length === 0" class="empty">No cameras found</li>
              <li v-for="camera in cameras">
                <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{
                  formatName(camera.name) }}</span>
                <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                  <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                </span>
              </li>
            </ul>
          </section>
          <section class="scans">
            <h2>Scans</h2>
            <ul v-if="scans.length === 0">
              <li class="empty">No scans yet</li>
            </ul>
            <transition-group name="scans" tag="ul">
              <li v-for="scan in scans" :key="scan.date" :title="scan.content" onclick="gotoStudentInfo(this.textContent.split('\n')[0]).split(':')[1]">{{scan.content.split('\n')[0].split(':')[1]}}
              </li>
            </transition-group>
            <ul>
              <a href="../students.php" class="btn bth-info">Back</a>
            </ul>
          </section>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <div class="preview-container">
      <video id="preview"></video>
    </div>
  </div>
  <script src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script>
    function gotoStudentInfo(str) {
      $(location).attr('href', '../students_info.php?id=' + str)
    }
  </script>

</body>

</html>