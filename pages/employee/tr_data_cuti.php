<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User'  ){ ?>
    <section class="content">
      <div class="container-fluid">  
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Cuti Karyawan
                           
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_tr_cuti.php"  name="submit">Cuti</a></div>
                        <div class="card-body">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Jumlah Cuti</th>
                                            <th>Keterangan</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php 
									 if($_SESSION['nama_level']=='Administrator')
											{
												$result = pg_query($con, " SELECT * FROM tr_cuti");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$nik = $data['nik']; ;
														$tgl_awal = $data['tgl_awal'];
														$tgl_akhir = $data['tgl_akhir'];
														$jumlah = $data['jumlah'];
														$keterangan = $data['keterangan'];
														$status =   $data['status'];
										?>
                                        <tr>
                                            <td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_awal"])); ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_akhir"])); ?></td> 
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["keterangan"]; ?></td> 
                                            <td><?php echo $data["status"]; ?></td> 
                                        </tr> 
										<?php 
													}
											}
											else
											{
												$result = pg_query($con, " SELECT * FROM tr_cuti WHERE nik ='".$_SESSION['nik']."'");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$nik = $data['nik']; ;
														$tgl_awal = $data['tgl_awal'];
														$tgl_akhir = $data['tgl_akhir'];
														$jumlah = $data['jumlah'];
														$keterangan = $data['keterangan'];
														$status =   $data['status'];
										?>
										  <tr>
                                            <td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_awal"])); ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_akhir"])); ?></td> 
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["keterangan"]; ?></td> 
                                            <td><?php echo $data["status"]; ?></td> 
                                        </tr> 
										<?php 
													}
											}
													?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  
    </section>
    <!-- /.content --> 
  <?php }
  include 'footer.php'; ?>