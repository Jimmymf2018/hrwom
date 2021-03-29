<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
  
    <!-- Main content -->
    <section class="content"> 
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Ijin</h6>
                        </div>
						
				 <form role="form" action="../../model/in_ijin.php" enctype="multipart/form-data" method="POST">  
				   <div class="box-body">
					 
                        <div class="card-body">
							<div class="form-row">
								<div class="col-md-2 mb-3">
									<div class="form-group">
									  <label for="id_dept">ID </label>
									  <input type="text" class="form-control"   id="id_ijin"  name="id_ijin" value="">
									</div>
								 </div>
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Jenis Ijin </label>
									  <input type="text" class="form-control"    id="jenis_ijin" name="jenis_ijin"  value="">
									</div>
								 </div>   
							</div>  
                           	
							 <div class="form-row">
								 <div class="col-md-2 mb-3">
									<div class="form-group">
									  <label for="Status">Status</label>
									<label class="switch">
									  <input type="checkbox" id="status"  name="status" checked>
									  <span class="slider round"></span>
									</label> 
									</div>
							   </div>
							</div>
							
                           
						 <button class="btn btn-primary" type="submit"  name="submit">Save</button> 
                        </div>
					</div> 
				</form>
						
                    </div>
                </div>  
    </section>
  <?php }
  include 'footer.php'; ?> 

 
  