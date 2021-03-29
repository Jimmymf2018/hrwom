
<?php include "../config/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WOM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dist/img/favicon.ico">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <script>
        $(document).ready(function() {
            App.init();
        });
    </script>  
	<script defer src="../dist/face-api.min.js"></script>
    <script defer src="../dist/script.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
   
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
	h1 {
			text-shadow: 2px 2px #00aaff;
		}
	</style>
	<style type="text/css">
.container{display:inline-block;width:320px;}
#Cam{background:rgb(255,255,215);}#Prev{background:rgb(255,255,155);}#Saved{background:rgb(255,255,55);}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <img src="../dist/img/wom3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <a href="#"><h1><b> HR </b><small><i> Fast</i></small></h1></a>
  </div>
  <!-- /.login-logo -->
                <div class="card text-center"> 
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Registrasi</h6>
                        </div> 
		<section class="content">   
		 <form role="form" id="form"  action="in_register.php" enctype="multipart/form-data" method="POST">   
				 <div align="center">   
					<div > <div  class="center" id="camera" name="camera"  width="640" height="480"> </div>  
					
					</div>  
					<div id="webcam"  style="display:none">
						<input type="button" style="display:none" value="Capture" onClick="preview()">
					</div>
					 <div id="simpan" style="display:none">
						<input type="button" style="display:none" value="Remove" onClick="batal()">
						<input type="button" style="display:none" value="Save" onClick="simpan()" style="font-weight:bold;">
					</div>
					 <div id="hasil" name="hasil"  style="display:none" class="image-tag"></div> 
			    </div> 
			 
	<div class="card">
    <div class="card-body register-card-body"> 
	  <div class="input-group mb-3">
          <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-barcode"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3"> 
          <input type="password" class="form-control"  id="password"  name="password" placeholder="Password"  onkeyup="CheckPassword(); return false;" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div> 
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  id="password2"  name="password2" placeholder="Ulang password" onkeyup="CheckPassword(); return false;" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		  <div id="error-nwl"></div>
		<div class="input-group mb-3"> 
		   <select  class="form-control"  id="departemen" name="departemen"  onchange="changeValue(this.value)"  required>
													  <option disabled selected> Pilih Departemen</option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_departemen"); 
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['id_dept']?>"><?=$data['nama_dept']?></option>   
													 <?php   
													  }
													 ?>
													  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-bookmark"></span>
            </div>
          </div>
        </div>
		  <div class="input-group mb-3"> 
		  <select   class="form-control"  id="jabatan" name="jabatan"   onchange="changeValue(this.value)"  required>
													  <option disabled selected> Pilih Jabatan</option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_jabatan"); 
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['id_jabatan']?>"><?=$data['nama_jabatan']?></option>   
													 <?php   
													  }
													 ?>
													  </select>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-user-plus"></span>
					</div>
				  </div>
				</div>
			<div class="input-group mb-3"> 
		   <select  class="form-control"  id="kode_cabang"  name="kode_cabang" onchange="changeValue(this.value)" required>
													  <option disabled selected> Pilih Cabang </option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_cabang"); 
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['kode_cabang']?>"><?=$data['nama_cabang']?></option>   
													 <?php   
													  }
													 ?>
													  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-bookmark"></span>
            </div>
          </div>
        </div> 
			<div class="input-group mb-3">  
				<img src="captcha/generate.php" alt="gambar" name="gambar" id="gambar"/> 
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-podcast"></span>
						</div>
					</div> 
					<div class="form-row"> 								  
						 <div class="col-md-24 mb-6">
							<div class="form-group">
								<input class="form-control" id="kode" name="kode" value="" placeholder="Kode Captcha" maxlength="5" required /> 
							</div>
						</div>	
					</div>
			</div>
				<div class="row">
				  <!--<div class="col-8">
					<div class="icheck-primary">
					  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
					  <label for="agreeTerms">
					  Saya menyetujui <a href="#">peraturan</a>
					  </label>
					</div>
				  </div>
				   /.col-->
				  <div class="col-4">
					<button type="submit" class="btn btn-primary btn-block" onClick="preview();simpan();myFunction()"  id="submit"  name="submit" >Register</button>
				  </div> 
				   
				  <!-- /.col -->
				</div>
			</div>
		</div>
	</form>

      
    <!-- /.form-box -->
  <!-- /.card -->
</div> 
<!-- /.login-box -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	  <script src="webcam.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
    <script language="Javascript">
   function CheckPassword()
{
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#b2f7b9";
    var badColor = "#fcd7cf";
    var fontColor1 = "#f5360c";
    var fontColor2 = "#39d450";
 	
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = fontColor1;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = fontColor1;
        message.innerHTML = " Kurang dari 6 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = fontColor2;
        message.innerHTML = "Cocok!"
    }
	else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = fontColor1;
        message.innerHTML = " Password tidak sama"
    }
}   
    </script>
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
                 
                 Webcam.upload( data_uri, 'upload_reg.php', function(code, text) {} );
  
                document.getElementById('hasil').innerHTML = 
                    '<p>Hasil : </p>' + 
                    '<img src="'+data_uri+'"/>';
                
                Webcam.unfreeze();
            
                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            } );
        }
		 /* function simpan() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('hasil').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }*/
    </script> 
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
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
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

