<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <section class="content">
      <div class="container-fluid"> 
  
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
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Master Cuti
                           
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_cuti.php"  name="submit">Tambah</a></div>
                        <div class="card-body">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Jenis</th> 
                                            <th>Jumlah</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php 
												$result = pg_query($con, " SELECT * FROM m_cuti");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$id_cuti = $data['id_cuti']; ;
														$jenis_cuti = $data['jenis_cuti']; 
														$jumlah = $data['jumlah']; 
														$status =   $data['status'];
										?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $data["id_cuti"]; ?></td>
                                            <td><?php echo $data["jenis_cuti"]; ?></td> 
                                            <td style="text-align:center;" ><?php echo $data["jumlah"]; ?></td> 
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
 
  