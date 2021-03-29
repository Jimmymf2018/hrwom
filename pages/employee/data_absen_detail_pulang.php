<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User' ){ ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">  
       
  <style>
 
a:hover {
  text-decoration: underline;
}
 
.zoom-effect {
  position: relative;
  width: 170%;
  height: 360px;
  margin: 0 auto;
  overflow: hidden;
}
 
.kotak img {
  -webkit-transition: 0.4s ease;
  transition: 0.4s ease;
  width: 200px;
  height: 100px;
}

.zoom-effect:hover .kotak img {
  -webkit-transform: scale(2.08);
  transform: scale(2.08);
}
.responsive {
  width: 80%;
  height: auto;
}
img {
  width: 50%;
  height: auto;

</style>

    <!-- Main content -->  
       <div class="box box-default"> 
			<div class="page-data">
				 <div class="box box-primary"> 
			<?php $date = date('Y-m-d'); ?> 
			<?php ini_set('date.timezone', 'Asia/Jakarta');?> 
     <form role="form"  data-parsley-validate="true"  enctype="multipart/form-data" method="POST">  	 
						<?php    
						$nik = $_REQUEST['nik'];
						$tgl = $_REQUEST['tgl'];  
						$pulang = $_REQUEST['pulang']; 
						$latitude5 = $_REQUEST['latitude'];
						$longitude5 = $_REQUEST['longitude']; 
						$result = pg_query($con, "SELECT * FROM m_absen where nik='".$nik."' and tgl = '".$tgl."' and pulang='".$pulang."' group by id");
								 while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
									$nik2 = $data['nik'];
									$nama = $data['nama'];
									$tgl =  $data['tgl']; 
									$pulang = date_format(new DateTime($data['pulang']), 'H:i:s');
									$kota =  $data['kota2'];
									$propinsi =  $data['propinsi2']; 
									$latitude =  $data['latitude2'];
									$longitude =  $data['longitude2'];
									$foto =  $data['foto2'];
						?>
       <div class="box-body"> 
			<div class="card-body">
				<div class="form-row"> 
					<div class="col-md-6 mb-3">
						<h3 class="box-title"><div class="form-group"> Cek Detail Pulang</label>  
						</div></h3>
					</div>
				</div>
				<div class="form-row">
					 	<table  id="data-table1" class="table table-striped table-bordered table-hover" style="width:100%">   
					<thead>
					<tr>
					<th  style="text-align:center;width:50px"> Foto</th>
					<th  style="text-align:center;width:100px"> Detail </th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td> 
							<div class="wrapper">
								<div class="zoom-effect"> 
									 <img class="xzoom" src="../../model/foto/<?php echo  $foto; ?>" id="responsive-image" alt="Forest" >  
									</div>
								</div> 
					</td>
					<td>
							<div class="form-row">   
								<div class="col-md-2 col-25">
									<div class="form-group">
									  <label for="id_dept">NIK : <?php echo  ucwords($_SESSION['nik']); ?></label><hr style="width:100%;text-align:left;margin-left:0">
								
									  <label for="nama_dept">Nama : <?php echo  ucwords($_SESSION['username']); ?></label> <hr style="width:100%;text-align:left;margin-left:0">
								 
									  <label for="pulang">Pulang : <?php echo  $pulang; ?></label></b> <hr style="width:100%;text-align:left;margin-left:0">
								 
									  <label for="jabatan">Kota : <?php echo  $kota; ?></label></b>  <hr style="width:100%;text-align:left;margin-left:0">
								 
									  <label for="propinsi">Propinsi : <?php echo  $propinsi; ?></label></b>   <hr style="width:100%;text-align:left;margin-left:0">
							 
									 <label for="latitude">Latitude : <?php echo  $latitude; ?></label></b>    <hr style="width:100%;text-align:left;margin-left:0">
								 
									 <label for="longitude">Longitude  : <?php echo  $longitude; ?></label></b>     <hr style="width:100%;text-align:left;margin-left:0">
								   </div>      
								 </div>
							</div>
					 </td>
					 </tbody>
					 </table> 
				 </div> 
          </div> 
									<?php  } ?> 
		  </div>
    </form>
	<div hidden >Propinsi: <span id="state"></span></div>
	<div hidden>Kota: <span id="city"></span></div> 
 
	<div style="width: 100%">
	 <script>
		 
		</script> 

		<div class="iframe-rwd"><div id="anchor"></div></div> 
		 
		</div>
		</div>
		</div>
 
	</div>    
 </div>
	</section> 
	<?php 
	}											
	?> 
<link rel="stylesheet" type="text/css" href="https://unpkg.com/xzoom/dist/xzoom.css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	
	<script>	
	$(document).ready(function() {
		var table = $('#data-table').DataTable( {
			rowReorder: {
				selector: 'td:nth-child(2)'
			},
			responsive: true
		} );
	} );
	</script> 
<script>
$(".xzoom").xzoom({
    position: 'right',
    Xoffset: 15
});
</script>
	<script>	
  function getCurrentTime() {
  var d = new Date();
  function z(n){ return (n<10? '0':'') + n;}
  return z(d.getHours()) + ':' + 
         z(d.getMinutes()) + ':' + 
         z(d.getSeconds());
}
	</script> 
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
	

<script type="text/javascript">
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var hh = today.getHours();
  var mm = today.getMinutes();
  var ss = today.getSeconds();
  // add a zero in front of numbers<10
  mm = checkTime(mm);
  ss = checkTime(ss);
  document.getElementById('jam_absen').innerHTML = hh + ":" + mm + ":" + ss;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
	</script>
	<script language="JavaScript">
		var curday = function(sp){
		today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //As January is 0.
		var yyyy = today.getFullYear();
		
		if(dd<10) dd='0'+dd;
		if(mm<10) mm='0'+mm;
		return (mm+sp+dd+sp+yyyy);
		};
		console.log(curday('/'));
		console.log(curday('-'));
	document.getElementById("tgl").innerHTML = curday('-');
		</script> 
	 
<script> 
	/**/
	function getlocation(){ 
                navigator.geolocation.getCurrentPosition(myaddress4); 
        } 
	

	function myaddress4(pos) { // window.addEventListener("load", function() {
		

		var iDiv = document.createElement('iframe'); 

		iDiv.id = 'iframe';
		iDiv.width = '800px';
		iDiv.height = '640px'; 
		iDiv.z=14;
	   // iDiv.src = 'https://maps.google.com/maps?q=latitude,longitude&hl=fa;z=14&ie=UTF8&output=embed&hl=en';
	   iDiv.src = 'https://maps.google.com/maps?q='+<?php echo $latitude; ?>+','+<?php echo  $longitude; ?>+'&ie=UTF8&output=embed&hl=en';
	   document.getElementById("anchor").appendChild(iDiv);
	  
	 // });
// Step 2: Get city name 
function getCoordintes() { 
    var options = { 
        enableHighAccuracy: true, 
        timeout: 5000, 
        maximumAge: 0 
    	}; 
  
		function success(pos) { 
			var crd = pos.coords; 
			var lat = crd.latitude.toString(); 
			var lng = crd.longitude.toString(); 
			var coordinates = [lat, lng]; 
			console.log(`Latitude: ${lat}, Longitude: ${lng}`); 
			getCity(coordinates); 
			return;  
		} 
	
		function error(err) { 
			console.warn(`ERROR(${err.code}): ${err.message}`); 
		}  
		navigator.geolocation.getCurrentPosition(success, error, options); 
	}  
 	} 
	</script> 	 
</body>

</html>
   

 
  