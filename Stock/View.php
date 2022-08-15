
<!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #stock {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../Home/sidebarHome.php';?>

    <!-- For helpers -->
    <?php include '../phpSource/helpers.php';?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="margin-top:2%">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <div class="container-fluid">
            <!-- Small Box (Stat card) -->
            <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Production</span>
                <span class="info-box-number"><?php echo $prod_number?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pond Status</span>
                <span class="info-box-number">
                  <?php echo ROUND($pond_status * 100 / $pond_total);?>
                  <small style="color:lightblue">%</small>
                  <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;",$pond_status ," / ",  $pond_total ;?>
                </span>

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
                <span class="info-box-number"><?php echo "0";?></span>
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
                <span class="info-box-text">Fingerlings Release</span>
                <span class="info-box-number"><?php echo $fingerlings_total;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

              <div class="row">
            <?php
            $con = new mysqli(H,U,P,D);
            $sql = "SELECT * FROM production  ORDER BY stock_number ASC";
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

                        echo '<div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box '.$color[$row['stock_number']].'">
                                  <div class="inner">
                                    <h3>'.$row['stock_number'].'</h3>
              
                                    <p>Fingerlings : <button class="btn btn-primary">'.$row['fingerlings'].'</button></p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-lg fa-fish"></i>
                                  </div>
                                  <a href="StockDetails?id='.$row['stock_number'].'" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>
                    '  ;
            }
            }?>
            </div>
          </div>
        </div>

    <!-- For footer -->
    <?php include '../includes/footer.php';?>

    <!-- For footerscripts -->
    <?php include '../includes/footerScripts.php';?>
