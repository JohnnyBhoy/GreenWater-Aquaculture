<!--**Count the pond available-->
<?php  
  $pond_status= "SELECT count(pond) FROM pond where used = 1";
  $qry= $con->prepare($pond_status);
  $qry->execute();
  $qry->bind_result($pond_status);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>
<!--**Count the pond available-->
<?php  
  $pond_total= "SELECT count(pond) FROM pond";
  $qry= $con->prepare($pond_total);
  $qry->execute();
  $qry->bind_result($pond_total);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>


<!--**Count the pond available-->
<?php  
  $prod= "SELECT prod FROM harvest order by prod DESC LIMIT 1";
  $qry= $con->prepare($prod);
  $qry->execute();
  $qry->bind_result($prod);
  while($qry->fetch()){
    $datelog = date("m/d/Y h:i:sa");}

  $sales= "SELECT SUM(sale) as Sale FROM harvest where prod = $prod";
  $qry= $con->prepare($sales);
  $qry->execute();
  $qry->bind_result($sales);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!--**Count the pond available-->
<?php  
  $stock= "SELECT count(stock_number) FROM production";
  $qry= $con->prepare($stock);
  $qry->execute();
  $qry->bind_result($stock);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!--**Count the harvest-->
<?php  
  $harvest= "SELECT count(remarks) FROM production where remarks = 'Harvested'";
  $qry= $con->prepare($harvest);
  $qry->execute();
  $qry->bind_result($harvest);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>
<?php include '../phpSource/helpers.php';?>

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Main content -->
    <section class="content" style="margin-top:5%">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"> <?php echo ROUND($pond_status * 100 / $pond_total);?>
                  <small style="color:lightblue">%</small></span>
              <div class="info-box-content">
                <span class="info-box-text">Pond Status</span>
                <span class="info-box-number">  
                  <?php echo $pond_status ," / ",  $pond_total ;?> Occupied
                </span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Production</span>
                <span class="info-box-number"><?php echo $pond_total?> Stocks</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">Php <?php echo number_format($sales,2);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Harvest</span>
                <span class="info-box-number">
                  <?php echo $harvest * 100 / $stock;?>
                  <small style="color:lightblue">%</small>
                  <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;",$harvest ," / ",  $stock ;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box --> 
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Harvest Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales from <?php echo $dated;?> - <?php echo $mdated;?></strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Harvest Completion</strong>
                    </p>

            <?php
            $sql = "SELECT * FROM production p JOIN harvest h on p.stock_number = h.stock
            where p.remarks = 'Harvested' and p.prod_number = $prod_number ORDER BY stock_number ASC";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)> 0 )
            {
               while($row = mysqli_fetch_assoc($result)) {
                 $color = ['','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger',
                'bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger','bg-success','bg-info','bg-primary','bg-danger'];
                $rate = $row['fish'] * 100 / $row['fingerlings'];
                        echo '<div class="progress-group">
                      Harvest : '.$row['stock_number'].'
                      <span style="margin-left:10%">Sales : Php <b>'.number_format($row['sale'],2).'</b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar '.$color[$row['harvest']].'" style="width: '.$rate.'%"></div>
                      </div>
                    </div>
                    '  ;
                  }
            }?>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">Php <?php echo number_format($sales,2);?></h5>
                      <span class="description-text">TOTAL SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">Php <?php echo number_format($sales,2);?></h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">Php <?php echo number_format($sales,2);?></h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">10</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->