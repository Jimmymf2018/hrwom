<?php 
//include "../config/config.php";

    if ( $_SESSION['nama_level']=='User' ){ 
?>
	<style>
	h4 {
			text-shadow: 2px 2px #00aaff;
		}
	</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/wom3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> <h4><b> HR </b><small><i>Fast</i></small></h4></span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../model/foto_user/<?php echo $_SESSION['imagefile']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo  ucwords($_SESSION['username']); ?></br><small><i class="fas fa-suitcase"></i> &nbsp;&nbsp;<?php echo  ucwords($_SESSION['nama_jabatan']); ?></small></br><small><i class="fas fa-university"></i> &nbsp;&nbsp;<?php echo  ucwords($_SESSION['nama_cabang']); ?>
              </small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="container_user.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
          </li>  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-recycle"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-warning right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee/absen.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee/tr_data_cuti.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee/tr_data_ijin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Izin</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Attendance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee/data_absen.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Absensi</p>
                </a>
              </li> 
            </ul> 
          </li> 
		 
        </ul>
      </nav> 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
	<?php }
	?>