<?php include 'header.php';
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User' ){ ?>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Absen
                            </h6>
                        <div class="card-body">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Masuk</th>
                                            <th>Pulang</th> 
                                            <th>Keterangan</th> 
                                        </tr>
                                    </thead> 
									
                                    <tbody>
									 <?php  
											include('./hari.php'); 
											$hari = array ( 1 =>    'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu',
																	'Minggu'
													);
											if($_SESSION['nama_level']=='Administrator')
											{
												$result = pg_query($con, "select z.tgl_bulan ,a.nik,a.nama,a.tgl,b.tgl as tgl2 ,a.masuk,a.pulang,a.latitude,a.longitude,a.keterangan,b.keterangan as ket_libur,c.keterangan as ket_cuti,d.keterangan as ket_ijin,to_char(a.tgl, 'Day') AS hari  from 
																			(select * from (
																			select generate_series(
																					 (date '2021-01-01')::timestamp,
																					 (date '2021-12-31')::timestamp,
																					 interval '1 day'
																				   )
																			) as twenty_twenty(tgl_bulan) 
																		  where date_part('month', twenty_twenty.tgl_bulan) = 3 ) as z  left join m_absen a ON (a.tgl)::timestamp=z.tgl_bulan  
																			left join m_libur b ON a.tgl=b.tgl 
																			left join tr_cuti c ON c.nik=a.nik and c.tgl_awal=a.tgl
																			left join tr_ijin d ON d.nik=a.nik and d.tgl_awal=a.tgl  
																		  ORDER BY a.tgl");
													while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
														$nik = $data['nik']; 
														$tgl_bulan=$data['tgl_bulan'];
														$tgl = $data['tgl'];
														$tgl2 = $data['tgl2'];
														$masuk = $data['masuk'];
														$pulang = $data['pulang']; 
														$latitude = trim($data['latitude']);
														$longitude =  trim($data['longitude']);
														$keterangan =  trim($data['keterangan']);
														$ket_libur = $data['ket_libur'];
														$ket_cuti = $data['ket_cuti'];
														$ket_ijin = $data['ket_ijin'];
														$timestamp = strtotime($tgl);
														$num = date('N', strtotime($tgl_bulan)); 
														$tgl3 = $hari[$num];
													
										?>   
                                        <tr>
                                            <td style="background-color:#c2ffe4" ><?php echo $data["nik"]; ?></td>
                                            <td style="background-color:#c2ffe4"><?php echo $data["nama"]; ?></td>
											<?php if( $tgl3=='Sabtu' || $tgl3=='Minggu' ){?>
                                            <td style="background-color:#ffb39c"><?php echo $hari[$num]; ?></td>
											 <?php } else { ?> 											 
                                            <td style="background-color:#faff69"><?php echo $hari[$num]; ?></td>
											  <?php } ?> 
                                            <td><?php echo  date('Y-m-d', strtotime($tgl_bulan)); ?></td> 
												
												<?php if(date('Y-m-d', strtotime($tgl_bulan))==$tgl ){ ?>
												 <td style="background-color:#ffffa6"><a href="./data_absen_detail_masuk.php?nik=<?php echo $nik; ?>&amp;tgl=<?php echo $tgl; ?>&amp;masuk=<?php echo $masuk; ?>&amp;latitude=<?php echo $latitude; ?>&amp;longitude=<?php echo $longitude; ?>"> <?php echo date_format(new DateTime($data["masuk"]), 'H:i:s') ; ?><a/></td> 
												 <td  style="background-color:#ffffa6"><a href="./data_absen_detail_pulang.php?nik=<?php echo $nik; ?>&amp;tgl=<?php echo $tgl; ?>&amp;pulang=<?php echo $pulang; ?>&amp;latitude=<?php echo $latitude; ?>&amp;longitude=<?php echo $longitude; ?>"> <?php echo date_format(new DateTime($data["pulang"]), 'H:i:s'); ?><a/></td> 
												 <?php } else  if($tgl=='' ){?> 
												<td style="background-color:#ffffa6">-</td> 
												 <td  style="background-color:#ffffa6">-</td>  
												<?php } else {?> 
												<td style="background-color:#ffffa6">-</td> 
												 <td  style="background-color:#ffffa6">-</td>  
												<?php } ?>
												 
												 <?php if(!$ket_ijin==""){ ?>
												<td  style="background-color:#feffdb"><?php echo $data["ket_ijin"]; ?></td>  
												 <?php } else if(!$ket_libur==""){ ?>
												<td  style="background-color:#fad1b6"><?php echo $data["ket_libur"]; ?></td> 
												 <?php } else if(!$ket_cuti==""){ ?> 
												<td><?php echo $data["ket_cuti"]; ?></td> 
												<?php } else {?>  
												 <td  style="background-color:#c2ffe4" ><?php echo $data["keterangan"];?></td>  
												<?php } ?>
                                        </tr> 
										<?php 
												} 
											} 
											else
											{	$hari = array ( 1 =>    'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu',
																	'Minggu'
													);
												$result = pg_query($con, "select z.tgl_bulan ,a.nik,a.nama,a.tgl,b.tgl as tgl2 ,a.masuk,a.pulang,a.latitude,a.longitude,a.keterangan,b.keterangan as ket_libur,c.keterangan as ket_cuti,d.keterangan as ket_ijin,to_char(a.tgl, 'Day') AS hari  from 
																	(select * from (
																	select generate_series(
																			 (date '2021-01-01')::timestamp,
																			 (date '2021-12-31')::timestamp,
																			 interval '1 day'
																		   )
																	) as twenty_twenty(tgl_bulan) 
																  where date_part('month', twenty_twenty.tgl_bulan) = 3 ) as z  left join m_absen a ON (a.tgl)::timestamp=z.tgl_bulan  
																	left join m_libur b ON a.tgl=b.tgl 
																	left join tr_cuti c ON c.nik=a.nik and c.tgl_awal=a.tgl
																	left join tr_ijin d ON d.nik=a.nik and d.tgl_awal=a.tgl 
																	WHERE a.nik ='".$_SESSION['nik']."'
																  ORDER BY a.tgl");
											while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
												$nik = $data['nik']; 
												$tgl_bulan=$data['tgl_bulan'];
												$tgl = $data['tgl'];
												$tgl2 = $data['tgl2'];
												$masuk = $data['masuk'];
												$pulang = $data['pulang']; 
												$latitude = trim($data['latitude']);
												$longitude =  trim($data['longitude']);
												$keterangan =  trim($data['keterangan']);
												$ket_libur = $data['ket_libur'];
												$ket_cuti = $data['ket_cuti'];
												$ket_ijin = $data['ket_ijin'];
												$timestamp = strtotime($tgl);
												$num = date('N', strtotime($tgl_bulan)); 
												$tgl3 = $hari[$num];
											 
										?>   <tr>
                                            <td style="background-color:#c2ffe4" ><?php echo $data["nik"]; ?></td>
                                            <td style="background-color:#c2ffe4"><?php echo $data["nama"]; ?></td>
											<?php if( $tgl3=='Sabtu' || $tgl3=='Minggu' ){?>
                                            <td style="background-color:#ffb39c"><?php echo $hari[$num]; ?></td>
											 <?php } else { ?> 											 
                                            <td style="background-color:#faff69"><?php echo $hari[$num]; ?></td>
											  <?php } ?> 
                                            <td><?php echo  date('Y-m-d', strtotime($tgl_bulan)); ?></td> 
												
												<?php if(date('Y-m-d', strtotime($tgl_bulan))==$tgl ){ ?>
												 <td style="background-color:#ffffa6"><a href="./data_absen_detail_masuk.php?nik=<?php echo $nik; ?>&amp;tgl=<?php echo $tgl; ?>&amp;masuk=<?php echo $masuk; ?>&amp;latitude=<?php echo $latitude; ?>&amp;longitude=<?php echo $longitude; ?>"> <?php echo date_format(new DateTime($data["masuk"]), 'H:i:s') ; ?><a/></td> 
												 <td  style="background-color:#ffffa6"><a href="./data_absen_detail_pulang.php?nik=<?php echo $nik; ?>&amp;tgl=<?php echo $tgl; ?>&amp;pulang=<?php echo $pulang; ?>&amp;latitude=<?php echo $latitude; ?>&amp;longitude=<?php echo $longitude; ?>"> <?php echo date_format(new DateTime($data["pulang"]), 'H:i:s'); ?><a/></td> 
												 <?php } else  if($tgl=='' ){?> 
												<td style="background-color:#ffffa6">-</td> 
												 <td  style="background-color:#ffffa6">-</td>  
												<?php } else {?> 
												<td style="background-color:#ffffa6">-</td> 
												 <td  style="background-color:#ffffa6">-</td>  
												<?php } ?>
												 
												 <?php if(!$ket_ijin==""){ ?>
												<td  style="background-color:#feffdb"><?php echo $data["ket_ijin"]; ?></td>  
												 <?php } else if(!$ket_libur==""){ ?>
												<td  style="background-color:#fad1b6"><?php echo $data["ket_libur"]; ?></td> 
												 <?php } else if(!$ket_cuti==""){ ?> 
												<td><?php echo $data["ket_cuti"]; ?></td> 
												<?php } else {?>  
												 <td  style="background-color:#c2ffe4" ><?php echo $data["keterangan"];?></td>  
												<?php } ?>
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
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

	
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
	<script>	
	$(document).ready(function() {
		var table = $('#data-table').DataTable( {
			rowReorder: {
				selector: 'td:nth-child(2)'
			},
			responsive: true,
			 dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		} );
	} );
	</script> 
	<script>	
	function createDateRange($startDate, $endDate, $format = "d-m-Y")
{
    $begin = new DateTime($startDate);
    $end = new DateTime($endDate);
 
    $interval = new DateInterval('P1D'); // 1 Day
    $dateRange = new DatePeriod($begin, $interval, $end);
 
    $range = [];
    foreach ($dateRange as $date) {
        $range[] = $date->format($format);
    }
 
    return $range;
}
	</script> 
 </div>
 </div>
	<?php 
	}			
  include 'footer.php';
	?> 

 
  