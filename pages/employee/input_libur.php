<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <section class="content"> 
	      <div class="container-fluid">   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hari Libur</h6>
                        </div> 
						 <form role="form" action="../../model/in_libur.php" enctype="multipart/form-data" method="POST">  
						   <div class="box-body"> 
								<div class="card-body">
									<div class="form-row"> 
											<div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="nama_dept">Tanggal</label>
											 <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
											  <input type="text" class="form-control datetimepicker-input" id="tgl"  name="tgl"   data-target="#datetimepicker1"  placeholder="Start Date"/>
											  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											  </div>  
											</div>
										 </div>
										 </div>
										 <div class="col-md-6 mb-3">
											<div class="form-group">
											  <label for="id_dept">Keterangan</label>
											  <input type="text" class="form-control"   id="keterangan"  name="keterangan"   placeholder="Keterangan">
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