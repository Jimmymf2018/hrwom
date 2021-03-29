<?php include 'header.php';
 
  if ($_SESSION['nama_level']=='Administrator'){ ?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
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
  height: 18px;
  width: 18px;
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        
	   
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan
                           
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_jabatan.php"  name="submit">Tambah</a></div>
                        <div class="card-body">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>ID Jabatan</th>
                                            <th>Nama Jabatan</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php 
												$result = pg_query($con, " SELECT * FROM m_jabatan");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$id_jabatan = $data['id_jabatan']; 
														$nama_jabatan = $data['nama_jabatan'];
														$status =   $data['status'];
										?>
                                        <tr>  
                                            <td><?php echo $id_jabatan; ?></td> 
                                            <td><?php echo $nama_jabatan; ?></td> 
                                            <td style="text-align:center;"> <label class="switch">
										  <input type="checkbox" id="status"  name="status" checked>
										  <span class="slider round"></span>
										</label> </td>  
                                        </tr> 
										<?php 
													}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  
    </section>
  <?php }
  include 'footer.php'; ?> 
 
  