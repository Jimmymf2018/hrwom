<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User'  ){ ?>
    <!-- Main content -->
    <section class="content"> 
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Input User</h6>
                        </div>
						
     <form role="form" action="../../model/in_user.php" enctype="multipart/form-data" method="POST">  
       <div class="box-body">
         <table  style="width:100%">
		 <thead>
		 <th>
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
			<div align="center">
			<button type="submit" class="btn btn-danger btn-circle btn-xl"  onClick="preview();simpan()"  name="submit" ><i class="fa fa-check"></i> </button>
			</div>
		 </th>
		 </thead>
		 <tbody>
		 <td>
                        <div class="card-body">
                            <div class="form-row"> 
								 <div class="col-md-2 mb-3">
									<div class="form-group">
									  <label for="nama_dept">NIK</label>
									  <input type="text" class="form-control"  id="nik"   name="nik"   placeholder="NIK">
									</div>
								 </div> 
						
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Nama </label>
									  <input type="text" class="form-control"   id="username"  name="username"   placeholder="Nama">
									</div>
								 </div> 
							 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Email </label>
									  <input type="text" class="form-control"   id="email"  name="email"   placeholder="Email">
									</div>
								 </div> 
							</div>
                         
                            <div class="form-row">
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Departemen</label> 
									   <select name="provinsi" class="form-control"  id="jenis_cuti"  onchange="changeValue(this.value)">
													  <option disabled selected> Pilih </option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_departemen");
													  //$jsArray = "var prdName = new Array();\n";
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['id_dept']?>"><?=$data['nama_dept']?></option>   
													 <?php  
													// $jsArray .= "prdName['".$data['id_cuti']."'] = {jumlah:'".addslashes($data['jumlah'])."'};\n"; 
													  }
													 ?>
													  </select>
									</div>
								 </div> 
							 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Jabatan</label> 
									   <select name="provinsi" class="form-control"  id="jenis_cuti"  onchange="changeValue(this.value)">
													  <option disabled selected> Pilih </option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_jabatan");
													//  $jsArray = "var prdName = new Array();\n";
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['id_jabatan']?>"><?=$data['nama_jabatan']?></option>   
													 <?php  
													// $jsArray .= "prdName['".$data['id_cuti']."'] = {jumlah:'".addslashes($data['jumlah'])."'};\n"; 
													  }
													 ?>
													  </select>
									</div>
								 </div> 
							</div>
                         
                            <div class="form-row"> 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Password</label>
									  <input type="password" class="form-control"   id="password"  name="password"   placeholder="Password">
									</div>
								 </div> 
						 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Level</label>
									  <select class="form-control" id="level">
												<option value="Administrator">Administrator</option>
												<option value="User">User</option>
												<option value="Manager">Manager</option>
												<option value="Supervisor">Supervisor</option>
										</select>
									</div>
								 </div> 
							</div>
					   </td>
					</tbody> 
				</table>
						<!-- <button class="btn btn-primary" type="submit"  name="submit">Simpan</button> -->
			</div>
			</div> 
		</form>
		
		</div>
	</div>  
    </section>
    <!-- /.content --> 
 </div>
 </div>
	<?php 
	}											
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	  <script src="webcam.min.js"></script>
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
                 
                Webcam.upload( data_uri, 'upload_user.php', function(code, text) {} );
  
                document.getElementById('hasil').innerHTML = 
                    '<p>Hasil : </p>' + 
                    '<img src="'+data_uri+'"/>';
                
                Webcam.unfreeze();
            
                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            } );
        }
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
	 
</body>

</html>
   

 
  