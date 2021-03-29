<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <section class="content"> 
	      <div class="container-fluid">   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">jabatan</h6>
                        </div> 
						 <form role="form" action="../../model/in_jabatan.php" enctype="multipart/form-data" method="POST">  
						   <div class="box-body"> 
								<div class="card-body">
									<div class="form-row"> 
									 
										 <div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="id_dept">ID jabatan</label>
											  <input type="text" class="form-control"   id="id_jabatan"  name="id_jabatan"   placeholder="ID Jabatan">
											</div>
										 </div> 
										  <div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="id_dept">Nama jabatan</label>
											  <input type="text" class="form-control"   id="nama_jabatan"  name="nama_jabatan"   placeholder="Nama Jabatan">
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