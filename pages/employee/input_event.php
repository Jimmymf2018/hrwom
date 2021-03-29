<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <!-- Main content -->
    <section class="content"> 
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Event WOM</h6>
                        </div>
						
     <form role="form" action="../../model/in_event.php" enctype="multipart/form-data" method="POST">  
       <div class="box-body">
         
                        <div class="card-body">
                            <div class="form-row"> 
								 <div class="col-md-6 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Event Title</label>
									  <input type="text" class="form-control"  id="title"   name="title"   placeholder="Event Title">
									</div>
								 </div> 
								 <div class="col-md-6 mb-3">
									<div class="form-group">
									  <label for="id_dept">Description</label>
									  <input type="text" class="form-control"   id="description"  name="description"   placeholder="Description">
									</div>
								 </div> 
							</div>
                         
                            <div class="form-row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Start Date</label>
									 <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
									  <input type="text" class="form-control datetimepicker-input" id="start_date"  name="start_date"   data-target="#datetimepicker1"  placeholder="Start Date"/>
									  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									  </div>  
									</div>
								 </div>
								 </div>
								 <div class="col-md-6 mb-3">
									<div class="form-group">
									  <label for="nama_dept">End Date</label>
									   <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
									  <input type="text" class="form-control datetimepicker-input" id="end_date" name="end_date" data-target="#datetimepicker2"  placeholder="Start Date"/>
									  <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									  </div>  
									</div>
									</div>
								 </div> 
							</div>
                       
                            <!--<div class="form-row">
								
								 <div class="col-md-6 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Created By</label> 
									   <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
									  <input type="text" class="form-control datetimepicker-input" id="created" name="created" data-target="#datetimepicker3"  placeholder="Start Date"/>
									  <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									  </div>  
									</div>
									</div>
								 </div> 
							</div>-->
						 <button class="btn btn-primary" type="submit"  name="submit">Save</button> 
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
   

 
  