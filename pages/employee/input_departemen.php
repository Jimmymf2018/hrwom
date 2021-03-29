<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <section class="content"> 
	      <div class="container-fluid">   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Departemen</h6>
                        </div> 
						 <form role="form" action="../../model/in_dept.php" enctype="multipart/form-data" method="POST">  
						   <div class="box-body"> 
								<div class="card-body">
									<div class="form-row"> 
									 
										 <div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="id_dept">ID Departemen</label>
											  <input type="text" class="form-control"   id="id_dept"  name="id_dept"   placeholder="ID Departemen">
											</div>
										 </div> 
										  <div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="id_dept">Nama Departemen</label>
											  <input type="text" class="form-control"   id="nama_dept"  name="nama_dept"   placeholder="Nama Departemen">
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