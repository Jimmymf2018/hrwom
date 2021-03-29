<?php  
session_start();

include "../config/config.php";  

if(isset($_SESSION["nik"])){   
		if((time() - $_SESSION["last_login_time"]) > 6600){ 
			header("location:../index.php");
		}  
} else {
	header("location: ../index.php");
}
	  
if ($_SESSION['nama_level']=='User' ){
 ?>
 <?php
?>
<?php include ('head.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    <!-- SEARCH FORM -- >
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <!--  <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <!-- <a href="#" class="dropdown-item"> 
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> 
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> 
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> 
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> 
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> 
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>-->
      <!-- Notifications Dropdown Menu -- >
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>-->
	     <li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="javascript:;" id="userDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  ucwords($_SESSION['username']); ?> / <?php echo  ucwords($_SESSION['nama_level']); ?></span>
				<img class="img-profile rounded-circle"
					src="../model/foto_user/<?php echo $_SESSION['imagefile']; ?>">  
			</a> 
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="userDropdown">
				 <!--<a class="dropdown-item" href="#">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>
				<a class="dropdown-item" href="#">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
					Settings
				</a>
				<a class="dropdown-item" href="#">
					<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
					Activity Log
				</a>
				<div class="dropdown-divider"></div>-->
				<a class="dropdown-item"  href="../model/aksi_logout.php" >
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
<?php include ('sidebar_user.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Branch </a></li>
			  <?php
			 
			  ?>
              <li class="breadcrumb-item active"><?php echo ucwords($_SESSION['nama_cabang']); ?> (<?php echo  ucwords($_SESSION['kode_cabang']); ?>)</li>
				<?php
					 
				?>
			</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Absent</h3>

                <p>98%</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-hand"></i>
              </div>
              <a href="employee/absen.php" class="small-box-footer"> Absen <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Ijin</h3>

                <p>53</p><!--<sup style="font-size: 20px">%</sup>-->
              </div>
              <div class="icon">
                <i class="ion ion-android-done"></i>
              </div>
              <a href="employee/input_tr_ijin.php" class="small-box-footer">Form Ijin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		   
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Cuti</h3>

                <p>4</p>
              </div>
              <div class="icon">
                <i class="ion ion-happy-outline"></i>
              </div>
              <a href="employee/input_tr_cuti.php" class="small-box-footer">Form Cuti <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Absensi</h3>

                <p>list</p>
              </div>
              <div class="icon">
                <i class="ion ion-help"></i>
              </div>
              <a href="employee/data_absen.php" class="small-box-footer">Data Absen <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
		
    
       <!-- Main Row-->
	   
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	  <!--  <div class="containe-fluid">	
					<h2>Event WOM Calendar</h2>	
					<div class="page-header">
						<div class="pull-right form-inline">
							<div class="btn-group">
								<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
								<button class="btn btn-default" data-calendar-nav="today">Today</button>
								<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
							</div>
							<div class="btn-group">
								<button class="btn btn-warning" data-calendar-view="year">Year</button>
								<button class="btn btn-warning active" data-calendar-view="month">Month</button>
								<button class="btn btn-warning" data-calendar-view="week">Week</button>
								<button class="btn btn-warning" data-calendar-view="day">Day</button>
							</div>&nbsp;&nbsp;
						<h3></h3>
						<small>
						<div class="row">
							<div class="col-md-9">
								<div id="showEventCalendar"></div>
							</div>
							<div class="col-md-3">
								<h4>All WOM Events List  </h4>
								<ul id="eventlist" class="nav nav-list"></ul>
							</div>
							</div>	
					</small>
					</div> 
				</div>
    </section>  
 </div>-->
 </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="../dist/js/calendar.js"></script>
<script type="text/javascript" src="../dist/js/events.js"></script>
<?php include ('footer.php'); } ?>
