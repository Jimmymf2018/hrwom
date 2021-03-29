<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator'){ ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
      
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Cabang</h6> 
                        </div>
                        <div class="card-body"> 
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_cabang.php"  name="submit">Tambah</a></div>
                        <div class="table-responsive">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:90%" >
                                    <thead>
                                        <tr>
                                            <th>Kode Cabang</th>
                                            <th>Nama Cabang</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Propinsi</th>
                                            <th>Telp</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php 
										$result = pg_query($con, " SELECT * FROM m_cabang");
											while($data=pg_fetch_assoc($result)){
										?>
                                        <tr>
                                            <td><?php echo $data["kode_cabang"]; ?></td>
                                            <td><?php echo $data["nama_cabang"]; ?></td>
                                            <td><?php echo $data["alamat"]; ?></td>
                                            <td><?php echo $data["kota"]; ?></td>
                                            <td><?php echo $data["propinsi"]; ?></td>
                                            <td><?php echo $data["telp"]; ?></td>
                                        </tr> 
										<?php 
												}	
										?>
                                    </tbody>
                                </table><div class="data-btn"> 
							</div>
                            </div>
                        </div>
                    </div>
                </div>  
    </section>
	 
  <?php }
  include 'footer.php'; ?>
 
  