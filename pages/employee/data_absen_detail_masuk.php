<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User' ){ ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
      
 
  <style>
 
.center { 
  margin-left: auto;
  margin-right: auto; 
  margin: auto;
  width: auto;
  border: 3px solid #73AD21; 
} 
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
 

.zoom-effect:hover .kotak img {
  -webkit-transform: scale(2.08);
  transform: scale(2.08);
}
.responsive {
  width: 20%;
  height: auto;
}
@media only screen and (max-width: 480px) {
  img {
  max-width: 100%;
  width: 500px; 
  }
}
#responsive-image {  width: 40%;  height: auto; } 
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
							$masuk = $_REQUEST['masuk']; 
						$latitude5 = $_REQUEST['latitude'];
						$longitude5 = $_REQUEST['longitude'];
						//$jam1=$jam; 
								$result = pg_query($con, "SELECT * FROM m_absen where nik='".$nik."' and tgl = '".$tgl."' and masuk='".$masuk."' group by id");
									while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
										$nik2 = $data['nik'];
										$nama = $data['nama'];
										$tgl =  $data['tgl'];
										$masuk = date_format(new DateTime($data['masuk']), 'H:i:s'); 
										$kota =  $data['kota'];
										$propinsi =  $data['propinsi']; 
										$latitude =  $data['latitude'];
										$longitude =  $data['longitude'];
										$foto =  $data['foto'];
						?>
       <div class="box-body"> 
			<div class="card-body">
				<div class="form-row"> 
					<div class="col-md-6 mb-3">
						<h3 class="box-title"><div class="form-group"> Detail Absen Masuk</label>  
						</div></h3>
					</div>
				</div>
					<table  id="data-table1" class="table table-striped table-bordered table-hover" style="width:100%">   
					<thead>
					<tr>
					<th  style="text-align:center;width:50px"> Foto</th>
					<th  style="text-align:center;width:100px"> Detail </th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="width:100px"> 
							<div class="form-row">   
							<div class="wrapper">
								<div class="zoom-effect"> 
									 <img class="xzoom" src="../../model/foto/<?php echo  $foto; ?>" id="responsive-image" alt="Forest" >  
									</div>
								</div> 
							</div>
					</td>
					<td  style="width:50px">
							<div class="form-row">   
								<div class="col-md-4 col-25">
									<div class="form-group">
									  <label for="id_dept">NIK : <?php echo  ucwords($_SESSION['nik']); ?></label><hr style="width:100%;text-align:left;margin-left:0">
								
									  <label for="nama_dept">Nama : <?php echo  ucwords($_SESSION['username']); ?></label> <hr style="width:100%;text-align:left;margin-left:0">
								 
									  <label for="masuk">Masuk : <?php echo  $masuk; ?></label></b> <hr style="width:100%;text-align:left;margin-left:0">
								 
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
									<?php  } ?> 
		  </div>
    </form> 
						<div style="width: 100%">  
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
	/*function getLocation()
	{
	  // Check whether browser supports Geolocation API or not
	  if (navigator.geolocation) { // Supported 
		
		navigator.geolocation.getCurrentPosition(getPosition);
	  } else { // Not supported
		alert("Oops! This browser does not support HTML Geolocation.");
	  }
	}
	function getPosition(position)
	{
	  document.getElementById("location").innerHTML = 
		  "Latitude: " + position.coords.latitude + "<br>" +
		  "Longitude: " + position.coords.longitude;
	}
	
	  $.ajax({
	  url: "https://geolocation-db.com/jsonp",
	  jsonpCallback: "callback",
	  dataType: "jsonp",
	  success: function(location) {
	//	var kota2 = $('#kota').val(); 
	//	var propinsi2 = $('#propinsi').val(); 
			 
	//	$('#kot').html(location.kota2);
	//	$('#prop').html(location.propinsi2);
		$('#locality').html(location.locality);
		$('#country').html(location.country_name);
		$('#state').html(location.state);
		$('#city').html(location.city);
		$('#postal_code').html(location.postal_code);
		$('#landmark').html(location.landmark);
		$('#latitude').html(location.latitude);
		//$('#latitude2').html(location.latitude);
		$('#longitude').html(location.longitude); 
		//$('#longitude2').html(location.longitude); 
		$('#ip').html(location.IPv4);

		var value = $("#latitude").text();
		//var lower=$("#latitude2").val(value);
		var value2 = $("#longitude").text();
		//var lower2=$("#longitude2").val(value2);
		var value3 = $("#city").text();
		 var kota=$("#kota").val(value3);

		var value4 = $("#state").text();
		 var value4=$("#propinsi").val(value4); 
		//alert(lower.val());
 		 var day = date.getDate();
		var lower3=$("#tgl").val(day);
		//===
		
	  }
	});  

	function myMap() {
	var mapProp= {
	  center:new google.maps.LatLng(latitude, longitude),
	  zoom:5,
	};
	var map = new google.maps.Map(document.getElementById("anchor"),mapProp);
	}*/
	</script> 
 

<script> 

/*function myaddress2() { // window.addEventListener("load", function() {
    var kota2 = document.getElementById("kota").value;
    var propinsi2 = document.getElementById("propinsi").value;
	var latitude = document.getElementById("latitude2").value;
	var longitude = document.getElementById("longitude2").value; 
    var iDiv = document.createElement('iframe');
    iDiv.id = 'iframe1';
    iDiv.width = '800px';
    iDiv.height = '640px'; 
	iDiv.z=14;
   // iDiv.src = 'https://maps.google.com/maps?q=latitude,longitude&hl=fa;z=14&ie=UTF8&output=embed&hl=en';
   iDiv.src = 'https://maps.google.com/maps?q='+kota2+',Indonesia&hl=fa;z=14&ie=UTF8&output=embed&hl=en';
   document.getElementById("anchor").appendChild(iDiv);
 // });
}*/
</script> 
<script> 
	/*
	function myaddress3() { // window.addEventListener("load", function() { 
		var kota2 = document.getElementById("kota").value;
		var propinsi2 = document.getElementById("propinsi").value;
	 	var latitude = document.getElementById("latitude2").value;
    	var longitude = document.getElementById("longitude2").value; 
		var iDiv = document.createElement('iframe');
		iDiv.id = 'iframe1';
		iDiv.width = '800px';
		iDiv.height = '640px'; 
		iDiv.z=14;
	   // iDiv.src = 'https://maps.google.com/maps?q=latitude,longitude&hl=fa;z=14&ie=UTF8&output=embed&hl=en';
	   iDiv.src = 'https://maps.google.com/maps?q='+pos.coords.latitude+','+pos.coords.longitude+'&ie=UTF8&output=embed&hl=en';
	   document.getElementById("anchor").appendChild(iDiv);
	 // });
	}*/
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
   

 
  