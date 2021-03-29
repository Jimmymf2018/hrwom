<?php 
include 'header.php'; 
  if ($_SESSION['nama_level']=='Administrator'){ ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
      
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6> 
                        </div>
                        <div class="card-body"> 
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_user.php"  name="submit">Tambah</a></div>
                        <div class="table-responsive">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama </th>
                                            <th>Jabatan</th>
                                            <th>Departemen</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Cabang</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php 
										$result = pg_query($con, "SELECT * FROM m_users a 
																	LEFT JOIN m_cabang b ON a.kode_cabang = b.kode_cabang  
																	LEFT JOIN m_departemen c ON c.id_dept=a.departemen  
																	LEFT JOIN m_jabatan d ON d.id_jabatan=a.jabatan
																	LEFT JOIN m_level e ON e.id_departemen =c.id_dept and  e.id_jabatan=d.id_jabatan and e.id_cabang = b.kode_cabang");
											while($data=pg_fetch_assoc($result)){
										?>
                                        <tr>
                                            <td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["username"]; ?></td>
                                            <td><?php echo $data["nama_dept"]; ?></td>
                                            <td><?php echo $data["nama_jabatan"]; ?></td>
                                            <td><?php echo $data["password"]; ?></td>
                                            <td><?php echo $data["nama_level"]; ?></td>
                                            <td><?php echo $data["nama_cabang"]; ?></td>
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
 
  