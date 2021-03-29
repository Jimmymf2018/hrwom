	   <?php
include "config/config.php";
									include('pages/employee/hari.php');
	  // $tgl= "2021-03-02";
	    for($i = 1; $i <= date('t'); $i++)
										 { 
										$date1= $dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
	   
	   	 $hari = array ( 1 =>    'Senin',
															'Selasa',
															'Rabu',
															'Kamis',
															'Jumat',
															'Sabtu',
															'Minggu'
														);
									$result = pg_query($con, " SELECT a.nik,a.nama,a.tgl,b.tgl as tgl2 ,a.masuk,a.pulang,a.latitude,a.longitude,b.keterangan,to_char(a.tgl, 'Day') AS hari FROM m_absen a left join m_libur b ON a.tgl=b.tgl ORDER BY a.tgl");
										  while($data = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
											
											$nik = $data['nik']; 
											$tgl = $data['tgl'];
											$tgl2 = $data['tgl2'];
											$masuk = $data['masuk'];
											$pulang = $data['pulang'];
											$latitude = trim($data['latitude']);
											$longitude =  trim($data['longitude']);
											$keterangan =  trim($data['keterangan']);
											$timestamp = strtotime($tgl);
											$num = date('N', strtotime($tgl));  
											 ?>
											 <?php 
										
										$num2 = date('N', strtotime($dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT) ));
											?>   
											<td><?php echo $data["nik"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td> 
																							 
											<td><?php echo $hari[$num2];  ?></td>      
											<td><?php echo $date1; ?></td>     
											<td><?php echo $tgl; ?></td>     
											 <?php //for($i = 1; $i <= 31; $i++)
											  foreach($tgl as $t ) { 
											?> 
											 
											<td> <?php echo date_format(new DateTime($data["masuk"]), 'H:i:s') ; ?> </td> 
											<td> <?php echo date_format(new DateTime($data["pulang"]), 'H:i:s'); ?> </td>  
											<td><?php echo $data["keterangan"]; ?></td> </br> 
													<?php 	} 
												?>  
											<td><?php echo $data["keterangan"]; ?></td> </br> 
										  <?php 	 }  
										  }   
												
												 $list=array();
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
    if (date('m', $time)==date('m'))
        $list[]=date('Y-m-d', $time);
}
echo  $tgl;
echo  $list[]=date('Y-m-d', $time);?> 