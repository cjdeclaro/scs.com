<!-- **********************************************************************************************************************************************************
      MAIN TOP  BAR MENU
      *********************************************************************************************************************************************************** -->
<!--topbar start-->

<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
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
<!--topbar end-->

<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->

<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

      <p class="centered"><a href="account.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
      <h5 class="centered">
      <?php
        echo $_SESSION['fname'].' '.$_SESSION['lname'];
      ?>
      </h5>

      <li class="mt">
        <a <?php if($page == "dashboard") echo 'class="active"' ?> href="index.php">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a <?php if($page == "students") echo 'class="active"' ?> href="students.php">
          <i class="fa fa-users"></i>
          <span>Students</span>
        </a>
      </li>
      <li class="sub-menu">
        <a <?php if($page == "medical_report") echo 'class="active"' ?> href="medical_report.php">
          <i class="fa fa-bars"></i>
          <span>Medical Report</span>
        </a>
      </li>
      <li class="sub-menu">
        <a <?php if($page == "account") echo 'class="active"' ?> href="account.php">
          <i class="fa fa-user"></i>
          <span>Account</span>
        </a>
      </li>
      <li class="sub-menu">
        <a <?php if($page == "settings") echo 'class="active"' ?> href="settings.php">
          <i class="fa fa-gear"></i>
          <span>Settings</span>
        </a>
      </li>

      <!--Navbar item with sub categories-->

      <!--li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-desktop"></i>
          <span>UI Elements</span>
        </a>
        <ul class="sub">
          <li><a href="general.html">General</a></li>
          <li><a href="buttons.html">Buttons</a></li>
          <li><a href="panels.html">Panels</a></li>
        </ul>
      </li-->

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->