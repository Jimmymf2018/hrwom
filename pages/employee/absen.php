<?php  
 include 'header.php';
 date_default_timezone_set('Asia/Jakarta');
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User' ){ ?>
  <style>
.rounded-circle{
    width: 40px;
    height: 40px;
    -webkit-border-radius: 60px;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 60px;
    -moz-background-clip: padding;
    border-radius: 60px;
    background-clip: padding-box;
    margin: 7px 0 0 5px;
    float: left;
    background-size: cover;
    background-position: center center;
}
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

</style>  
 
	<style>
#camera {
	display:block;
	width:100%;
	max-width:800px;
	border:1px solid #000;
}
#camera
{
    transform: rotateY(180deg);
    -webkit-transform:rotateY(180deg); /* Safari and Chrome */
    -moz-transform:rotateY(180deg); /* Firefox */
} 
</style>          
<style>
#map-canvas {
    height:400px;
    width:600px;
}
.controls {
    margin-top: 16px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
#pac-input {
    background-color: #fff;
    padding: 0 11px 0 13px;
    width: 400px;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
}
#pac-input:focus {
    border-color: #4d90fe;
    margin-left: -1px;
    padding-left: 14px;
    /* Regular padding-left + 1. */
    width: 401px;
}
.pac-container {
    font-family: Roboto;
}
#type-selector {
    color: #fff;
    background-color: #4d90fe;
    padding: 5px 11px 0px 11px;
}
#type-selector label {
    font-family: Roboto;
    font-size: 12px;
    font-weight: 300;
} 
/* === */
.iframe-rwd  {
position: relative;
padding-bottom: 65.25%;
padding-top: 30px;
height: 0;
overflow: hidden;
}
.iframe-rwd iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
/* ==== */ 

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
} 
</style>   
<style>  
.center {
  display: block;
  margin-left: auto;
  margin-right: auto; 
  margin: auto;
  width: 50%;
  border: 3px solid #73AD21;
  padding: -35px;
}
.container {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
    </style> <body class="hold-transition sidebar-mini layout-fixed"  onload="getlocation()">  
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <section class="content">
      <div class="container-fluid">   
						<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">WOM Absen</h6> 
                        </div>
 
    <!-- Main content -->   
       <div class="box box-default"> 
			<div class="page-data">
				 <div class="box box-primary">  
			<?php $date = date('Y-m-d'); ?> 
			<?php ini_set('date.timezone', 'Asia/Jakarta');?> 
			 <form role="form"  action="../../model/in_absen.php" data-parsley-validate="true"  enctype="multipart/form-data" method="POST">  	 
			   <div class="box-body"> 
			   <div class="form-row">
							<div class="col-25">
								<label class="form-group">Tanggal : </label>
									<!--<input type="text" class="form-control" readonly id="tgl"  name="tgl"  value="<?php echo date('Y-m-d'); ?>">-->
									<label id="tgl"></label>
								</div><h3 class="box-title"></h3>
							<div class="col-25">
								 <label class="form-group">Jam : </label>
									<!--<span id="jam_absen3" name="jam_absen3"  class="clock" onload="showTime()"></span></b></h3>
									<input type="text" class="form-control clock" readonly id="jam_absen"  name="jam_absen"  value="<?//=date(" H:i:s", time());?>">-->
									<label id="jam_absen" name="jam_absen" class="clock" ></label>
								</div><h3 class="box-title"></h3>
							</div>
					<div align="center">   
								<div > <div  class="center" id="camera" width="640" height="480"> </div>  
								
								</div>  
								<div id="webcam"  style="display:none">
									<input type="button" style="display:none" value="Capture" onClick="preview()">
								</div>
								 <div id="simpan" style="display:none">
									<input type="button" style="display:none" value="Remove" onClick="batal()">
									<input type="button" style="display:none" value="Save" onClick="simpan()" style="font-weight:bold;">
								</div>
								 <div id="hasil" name="hasil" style="display:none"></div> 
					</div>
					</br>
					<div align="center">
					 <?php 
					    
						$tgl2 = date("Y-m-d"); 
						$tgl1 =  date('Y-m-d H:i:s'); 
						$result = pg_query($con, "SELECT * FROM m_absen WHERE nik='".$_SESSION['nik']."' and tgl='".$tgl2."'   "); 
						$data = pg_fetch_array($result, NULL, PGSQL_ASSOC); 
								$masuk=$data['masuk'];   
								$pulang=$data['pulang'];  
								$tgl3=$data['tgl'];  
									
					if( $tgl3!=null && date("H")<12  && $masuk <>'00:00:00')
					{
					   echo '<button type="submit" class="btn btn-danger btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" disabled = "disabled" ><i class="fa fa-check"></i> </button>';
					}
					else if($tgl3!=null && date("H")>12  &&  $pulang <>'00:00:00')
					{
					   echo '<button type="submit" class="btn btn-danger btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" disabled = "disabled" ><i class="fa fa-check"></i> </button>';
					}
					else if($tgl3==null)
					{
					   echo '<button type="submit" class="btn btn-info btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" ><i class="fa fa-check"></i> </button>';
					}
					else
					{
					   echo '<button type="submit" class="btn btn-info btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" ><i class="fa fa-check"></i> </button>';						
					}
					?>
						<!--<button type="submit" class="btn btn-info btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" ><i class="fa fa-check"></i> </button> --> 
					   </div> 
					</br>
						
						<div class="form-row">
						
						<table id="data-table2" class="table table-striped table-bordered table-hover" style="width:100%" >
							<thead>
								<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Kota</th>
								<th>Propinsi</th> 
								</tr>
							</thead>  
							<tbody>
								<tr>
								<td><label><?php echo  ucwords($_SESSION['nik']); ?></label></td>
								<td><label><?php echo  ucwords($_SESSION['username']); ?></label></td>
								<td><b><span id="city"></span></b></td> 
								<td><b><span id="state"></span></b></td>
								</tr>
							</tbody>
						</table>
							<div class="col-25">
								<div class="form-group"> 
								  <input type="hidden" class="form-control col-75" readonly style="display:none" id="nik"  name="nik" >
								  <div id="nik" value="<?php echo  ucwords($_SESSION['nik']); ?>"></div>
								</div>
							 </div>
							 <div class="col-25">
								<div class="form-group"> 
								  <input type="hidden" class="form-control col-75" readonly  style="display:none" id="nama" name="nama"  value="<?php echo  ucwords($_SESSION['username']); ?>">
								</div>
							 </div>   
						
							<div class="col-25">
								 <div class="form-group"> 
								  <input type="hidden" class="form-control col-75"  readonly   id="kota"   name="kota">
								</div>
							</div>
					 
							<div class="col-25">
								 <div class="form-group"> 
								  <input type="hidden" class="form-control col-75"  readonly  id="propinsi"  name="propinsi">
								</div>
							</div>    
						   
							 <div class="col-25">
								<div class="form-group"> 
								 <input type="hidden" class="form-control col-75" readonly  style="display:none" id="latitude2" name="latitude2"  >
							   </div> 
						   </div>
						   
							 <div class="col-25">
								<div class="form-group"> 
								 <input type="hidden" class="form-control col-75"  readonly  style="display:none" id="longitude2" name="longitude2" >
							   </div> 
						   </div> 
						 </div>
					  <!-- /.box-body -->
						
				  </div>  
				  </div>
			</form> 
 
	<div style="width: 100%;height:80%">  

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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	  <script src="../js/webcam.min.js"></script>
    <script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 320,
            height: 240, 
			dest_width: 640,
			dest_height: 480,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach( '#camera' );
 
        function preview() { 
            Webcam.freeze(); 
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }
        
        function batal() { 
            Webcam.unfreeze();
             
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }
        
        function simpan() { 
            Webcam.snap( function(data_uri) {
                 
                Webcam.upload( data_uri, 'upload.php', function(code, text) {} );
  
                document.getElementById('hasil').innerHTML = 
                    '<p>Hasil : </p>' + 
                    '<img src="'+data_uri+'"/>';
                
                Webcam.unfreeze();
            
                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            } );
        }
    </script>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script>	
	$(document).ready(function() {
		var table = $('#data-table').DataTable( {
			
			"bFilter":false,
			"paging":   false,
			"ordering": false,
			"info":     false,
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
		return (dd+sp+mm+sp+yyyy);
		};
		console.log(curday('/'));
		console.log(curday('-'));
	document.getElementById("tgl").innerHTML = curday('-');
		</script>
<script>
	function getLocation()
	{ 
	  if (navigator.geolocation) { // Supported 
		
		navigator.geolocation.getCurrentPosition(getPosition);
		
		var button=document.getElementById("autoKlik");
		setInterval(function(){ 
			button.click();
		 }, 3000);
		 
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
		$('#locality').html(location.locality);
		$('#country').html(location.country_name);
		$('#state').html(location.state);
		$('#city').html(location.city);
		$('#postal_code').html(location.postal_code);
		$('#landmark').html(location.landmark); 
		$('#ip').html(location.IPv4);

		var value = $("#latitude").text(); 
		var value2 = $("#longitude").text(); 
		var city = $("#city").text();
		var state = $("#state").text();
		var kota=$("#kota").val(city); 
		var propinsi=$("#propinsi").val(state); 
  
		//$("#propinsi").html(state);  
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
	}/**/
	</script> 
 
  
	 
<script> 
	/**/
	function getlocation(){ 
                navigator.geolocation.getCurrentPosition(myaddress4); 
        } 
	

	function myaddress4(pos) { // window.addEventListener("load", function() {
		var latitude=pos.coords.latitude ;
		var longitude=pos.coords.longitude; 
   	    var kota2 = document.getElementById("kota").value; 
	  	pesan = 'posisi:'+latitude+','+longitude; 
	  
		var lat2=$("#latitude2").val(latitude); 
		var long2=$("#longitude2").val(longitude); 
		 document.getElementById("latitude2").innerHTML =  lat2; 
		 document.getElementById("longitude2").innerHTML =  long2; 
		 document.getElementById("kota").innerHTML =  kota2;  

		$("#latitude").html(latitude);
		$("#longitude").html(longitude);
		var iDiv = document.createElement('iframe'); 

		iDiv.id = 'iframe';
		iDiv.width = '800px';
		iDiv.height = '640px'; 
		iDiv.z=14;
	   // iDiv.src = 'https://maps.google.com/maps?q=latitude,longitude&hl=fa;z=14&ie=UTF8&output=embed&hl=en';
	   iDiv.src = 'https://maps.google.com/maps?q='+pos.coords.latitude+','+pos.coords.longitude+'&ie=UTF8&output=embed&hl=en';
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
   

 
  