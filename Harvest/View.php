    <!-- For header -->
    <?php include '../includes/header.php';?>
    <!-- For tab active styling -->
    <style> #harvest {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../Home/sidebarHome.php';?>
    <?php include '../phpSource/helpers.php';?>

    <?php  
  $harvest= "SELECT h.prod,h.harvest,h.stock,h.fish,h.weights,h.price,h.dated,h.employee,h.sale,p.fingerlings,p.remarks FROM harvest h 
  LEFT JOIN production p on h.stock = p.stock_number  where p.remarks = 'Harvested'";
  $qry= $con->prepare($harvest);
  $qry->execute();
  $qry->bind_result($prod,$harvest,$stock,$fish,$weights,$price,$dated,$employee,$sale,$fingerlings,$remarks);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:5%">
  <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" style="margin-top:-1%">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"> <?php echo ROUND($fishes * 100 / $tfingerlings);?>
                  <small style="color:lightblue">%</small></span>

              <div class="info-box-content">
                <span class="info-box-text">Survival Rate</span>
                <span class="info-box-number">
                  <?php echo  $fishes ," / ",  $tfingerlings ;?>
                </span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><?php echo $prod;?></span>

              <div class="info-box-content">
                <span class="info-box-text">Production</span>
                <span class="info-box-number">Harvested : <?php echo $harvest,'/',$stock_number;?></span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">Php <?php echo $sales;?>.00</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fish"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fish</span>
                <span class="info-box-number"><?php echo $fish ,"=", $weights," Kg.";?></span>
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
            $sql = "SELECT * FROM harvest h JOIN production p  ON h.Stock = p.stock_number
            where p.remarks = 'Harvested' ORDER BY h.stock ASC";
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
                                <div class="small-box '.$color[$row['harvest']].'">
                                  <div class="inner">
                                    <h3>'.$row['harvest'].'</h3>
              
                                    <p>Harvested : <button class="btn btn-primary">  '.$row['fish'].'  of '.$row['fingerlings'].'</button></p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-lg fa-fish"></i>
                                  </div>
                                  <a href="HarvestDetails?id='.$row['harvest'].'" class="small-box-footer">
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
