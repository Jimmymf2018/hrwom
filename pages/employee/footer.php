
    <!-- /.content --> 
 </div>
 </div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	
	 
	<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('jumlah').value = prdName[x].jumlah;   
    };  
    </script> 
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
	<script type="text/javascript">
	 $(function () {
		 $('#start_date').datetimepicker(); 
		 $('#end_date').datetimepicker();
	 });
   </script>
	<script language="JavaScript">
		var curday = function(sp){
		today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;  
		var yyyy = today.getFullYear();
		
		if(dd<10) dd='0'+dd;
		if(mm<10) mm='0'+mm;
		return (mm+sp+dd+sp+yyyy);
		};
		console.log(curday('/'));
		console.log(curday('-'));
		document.getElementById("tgl").innerHTML = curday('-');
	</script>	
	  
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
  function getCurrentTime() {
  var d = new Date();
  function z(n){ return (n<10? '0':'') + n;}
  return z(d.getHours()) + ':' + 
         z(d.getMinutes()) + ':' + 
         z(d.getSeconds());
}
	</script>  

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
	 
	function myaddress4(pos) {  

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
	
	 
</body>

</html>