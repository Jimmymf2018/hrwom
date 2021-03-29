<?php include 'header.php'; 
  if ($_SESSION['nama_level']=='Administrator' || $_SESSION['nama_level']=='User'  ){ ?>

    <!-- Main content -->
    <section class="content"> 
	      <div class="container-fluid">  
		  
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Cuti</h6>
                        </div>
						
     <form role="form" action="../../model/in_tr_cuti.php" enctype="multipart/form-data" method="POST">  
       <div class="box-body">
         
                        <div class="card-body">
							<div class="form-row">
								<div class="col-md-2 mb-3">
									<div class="form-group">
									  <label for="id_dept">NIK </label>
									  <input type="text" class="form-control" readonly id="nik"  name="nik" value="<?php echo  ucwords($_SESSION['nik']); ?>">
									</div>
								 </div>
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Nama </label>
									  <input type="text" class="form-control" readonly  id="nama" name="nama"  value="<?php echo  ucwords($_SESSION['username']); ?>">
									</div>
								 </div>   
							</div>
                            <div class="form-row"> 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Jenis Cuti</label> 
									   <select name="provinsi" class="form-control"  id="jenis_cuti"  onchange="changeValue(this.value)">
													  <option disabled selected> Pilih </option>
													 <?php 
													  $sql=pg_query($con,"SELECT * FROM m_cuti");
													  $jsArray = "var prdName = new Array();\n";
													  while($data = pg_fetch_array($sql, NULL, PGSQL_ASSOC)){ 
													 ?>
													   <option value="<?=$data['id_cuti']?>"><?=$data['jenis_cuti']?></option>   
													 <?php  
													 $jsArray .= "prdName['".$data['id_cuti']."'] = {jumlah:'".addslashes($data['jumlah'])."'};\n"; 
													  }
													 ?>
													  </select>
									</div>
								 </div> 
								 <div class="col-md-4 mb-3">
									<div class="form-group">
									  <label for="id_dept">Jumlah</label>
									  <input type="text" class="form-control"   readonly id="jumlah"  name="jumlah">
									</div>
								 </div> </div>
                         
                            <div class="form-row">
								  <div class="col-md-8 mb-3">
									<div class="form-group">
									  <label for="id_dept">Keterangan</label>
									  <input type="text" class="form-control"   id="keterangan"  name="keterangan"   placeholder="Keterangan">
									</div>
								 </div> 
							</div>
                         
                            <div class="form-row">
								<div class="col-md-3 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Tanggal Awal</label>
									 <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
									  <input type="text" class="form-control datetimepicker-input" id="tgl_awal"  name="tgl_awal"   data-target="#datetimepicker1"  placeholder="Tanggal Awal"/>
									  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									  </div>  
									</div>
								 </div>
								 </div>
								 <div class="col-md-3 mb-3">
									<div class="form-group">
									  <label for="nama_dept">Tanggal Akhir</label>
									   <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
									  <input type="text" class="form-control datetimepicker-input" id="tgl_akhir" name="tgl_akhir" data-target="#datetimepicker2"  placeholder="Tanggal Akhir"/>
									  <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									  </div>  
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

 
  