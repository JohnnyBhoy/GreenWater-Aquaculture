    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #harvest {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../Home/sidebarHome.php';?>
    
  <?php  
  $id=$_GET["id"];
  $harvest= "SELECT h.prod,h.harvest,h.stock,h.fish,h.weights,h.price,h.dated,h.employee,h.sale,p.fingerlings FROM harvest h 
  LEFT JOIN production p on h.stock = p.stock_number  where h.harvest =".$id;
  $qry= $con->prepare($harvest);
  $qry->execute();
  $qry->bind_result($prod,$harvest,$stock,$fish,$weights,$price,$dated,$employee,$sale,$fingerlings);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:7%">
  <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" style="margin-top:-1%">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"> <?php echo ROUND($fish * 100 / $fingerlings);?>
                  <small style="color:lightblue">%</small></span>

              <div class="info-box-content">
                <span class="info-box-text">Survival Rate</span>
                <span class="info-box-number">
                  <?php echo  $fish ," / ",  $fingerlings ;?>
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
                <span class="info-box-number">Stocks : <?php echo $stock;?></span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">Php <?php echo $sale;?>.00</span>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Harvest Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock Number</label>
                    <select class="form-control" type="number" name="stock"  id="exampleInputPassword1" style="width: 100%;">
                    <option><?php echo $stock;?></option>
                   </select>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fish Total/ piece</label>
                    <input type="number" value="<?php echo $fish;?>" name="fish" class="form-control" id="exampleInputPassword1" placeholder="Count of Fish" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Weight</label>
                    <input type="number" value="<?php echo $weights;?>"   name="weights" class="form-control" id="exampleInputPassword1" placeholder="Weight in Kilogram" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price/Kg.</label>
                    <input type="number"  value="<?php echo $price;?>"  name="price" class="form-control" id="exampleInputPassword1" placeholder="Price per Kilo" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Dated</label>
                    <input type="date" name="dated" class="form-control" value="<?php echo $dated;?>" id="exampleInputPassword1" placeholder="Stock Details"/>
                  </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                  <label>Employee Attended</label>
                  <select class="form-control" type="text" name="employee"  id="exampleInputPassword1"placeholder="Select a Employee" style="width: 100%;">
                  <option><?php echo $employee;?></option>
                  </select>
                </div>
                </div>
              </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

    <!-- For footer -->
    <?php include '../includes/footer.php';?>

    <!-- For footerscripts -->
    <?php include '../includes/footerScripts.php';?>

  <!-- For addscripts -->
  <?php include '../phpSource/addScripts.php';?>

