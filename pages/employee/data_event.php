<?php include 'header.php'; 
  if ($_SESSION['nama_level']=='Administrator' ){ ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <!--<div class="row">
          <div class="col-lg-3 col-6"> 
            <div class="small-box bg-info">
              <div class="inner">
                <h3>98%</h3>

                <p>Absent</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <div class="col-lg-3 col-6"> 
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Task</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <div class="col-lg-3 col-6"> 
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4</h3>

                <p>Leave</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
          <div class="col-lg-3 col-6"> 
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Project</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
        </div>-->
        <!-- /.row -->
		
    
       <!-- Main Row-->
	   
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	      <div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">WOM Event</h6> 
                        </div>
                        <div class="card-body"> 
						  </h6><div align="right"> <a class="btn btn-primary" href="../../pages/employee/input_event.php"  name="submit">Tambah</a></div>
                            <div class="table-responsive">
						<table id="data-table" class="table table-striped table-bordered table-hover responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Created By</th>
                                        </tr>
                                    </thead> 
									
                                    <tbody>
									 <?php 
												$result = pg_query($con, " SELECT * FROM m_events");
													while($data=pg_fetch_assoc($result)){
										?>
                                        <tr>
                                            <td><?php echo $data["id"]; ?></td>
                                            <td><?php echo $data["title"]; ?></td>
                                            <td><?php echo $data["description"]; ?></td>
                                            <td><?php echo $data["start_date"]; ?></td>
                                            <td><?php echo $data["end_date"]; ?></td>
                                            <td><?php echo $data["created"]; ?></td>
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
 
  