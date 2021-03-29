<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User'  ){ ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
       
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Ijin Karyawan
                           
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_tr_ijin.php"  name="submit">Ijin</a></div>
                        <div class="card-body">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Ijin</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Keterangan</th> 
                                            <th>NIK Aprove</th> 
                                            <th>Tanggal Aprove</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
									 <?php  
									 if($_SESSION['nama_level']=='Administrator')
											{
												$result = pg_query($con, " SELECT * FROM tr_ijin");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$nik = $data['nik']; ;
														$nama = $data['nama'];
														$tgl_awal = $data['tgl_awal'];
														$tgl_akhir = $data['tgl_akhir'];
														$jenis_ijin = $data['jenis_ijin'];
														$nik_atasan = $data['nik_atasan'];
														$keterangan = $data['keterangan'];
														$tgl_aprove = $data['tgl_approve'];
														$status =   $data['status'];
										?>
                                        <tr>
                                            <td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["jenis_ijin"]; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_awal"])); ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_akhir"])); ?></td> 
                                            <td><?php echo $data["keterangan"]; ?></td> 
                                            <td><?php echo $data["nik_atasan"]; ?></td> 
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_approve"])); ?></td> 
                                            <td><?php echo $data["status"]; ?></td> 
                                        </tr> 
										<?php 
											}
											}
											else
											{
												$result = pg_query($con, " SELECT * FROM tr_ijin  WHERE nik ='".$_SESSION['nik']."'");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){ 
														$nik = $data['nik']; ;
														$nama = $data['nama'];
														$tgl_awal = $data['tgl_awal'];
														$tgl_akhir = $data['tgl_akhir'];
														$jenis_ijin = $data['jenis_ijin'];
														$nik_atasan = $data['nik_atasan'];
														$keterangan = $data['keterangan'];
														$tgl_aprove = $data['tgl_approve'];
														$status =   $data['status'];
										?>
                                        <tr>
                                            <td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["jenis_ijin"]; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_awal"])); ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_akhir"])); ?></td> 
                                            <td><?php echo $data["keterangan"]; ?></td> 
                                            <td><?php echo $data["nik_atasan"]; ?></td> 
                                            <td><?php echo  date("d-m-Y", strtotime($data["tgl_approve"])); ?></td> 
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
  <?php }
  include 'footer.php'; ?> 
   

 
  