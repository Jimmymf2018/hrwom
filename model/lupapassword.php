<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WOM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../dist/img/favicon.ico">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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
	
  <style>
	h1 {
			text-shadow: 2px 2px #00aaff;
		}
	</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <img src="../dist/img/wom3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <a href="#"><h1><b> HR </b><small><i> Fast</i></small></h1></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lupa Password </p>

     <form action="cek_password.php" enctype="multipart/form-data"  method="post">
		  <div class="form-row"> 
				 <div class="col-md-12 mb-3">
					<div class="form-group">
					  <label for="nama_dept">NIK </label>
					  <input type="text" class="form-control"  id="nik"   name="nik"   placeholder="NIK" required>
					</div>
				 </div> 
				 </div> 
		  <div class="form-row"> 
				 <div class="col-md-12 mb-3">
					<div class="form-group">
					  <label for="id_dept">Email</label>
					  <input type="email" class="form-control"   id="email"  name="email"   placeholder="Email" required>
					</div>
				 </div> 
			</div> 
		<button class="btn btn-primary" type="submit"  name="submit">Cek</button> 
     <!--  <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      /.social-auth-links 

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script> 
</body>
</html>

