<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
  
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <section class="content"> 
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Cuti</h6>
                        </div>
						
     <form role="form" action="../../model/in_cuti.php" enctype="multipart/form-data" method="POST">  
       <div class="box-body">
         
                        <div class="card-body">
							<div class="form-row">
								<div class="col-md-2 mb-3">
									<div class="form-group">
									  <label for="id_dept">ID </label>
									  <input type="text" class="form-control" id="id_cuti"  name="id_cuti" value="">
									</div>
								 </div>
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Jenis </label>
									  <input type="text" class="form-control"   id="jenis_cuti" name="jenis_cuti"  value="">
									</div>
								 </div>   
							</div>
                            <div class="form-row"> 								  
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Jumlah</label>
									  <input type="text" class="form-control"   id="jumlah"  name="jumlah">
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

 
  