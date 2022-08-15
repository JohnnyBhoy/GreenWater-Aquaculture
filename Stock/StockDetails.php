    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #stock {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../Home/sidebarHome.php';?>
    <?php include '../phpSource/helpers.php';?>
    
  <?php  
  $id=$_GET["id"];
  $stock_number= "SELECT prod_number,stock_number,pond,fingerlings,feeds,biomass,probiotic,stockdate,employee,remarks,dated FROM production where stock_number =".$id;
  $qry= $con->prepare($stock_number);
  $qry->execute();
  $qry->bind_result($prod_number,$stock_number,$pond,$fingerlings,$feeds,$biomass,$probiotic,$stockdate,$employee,$remarks,$dated);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:6%">
  <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" style="margin-top:-1%">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pond Status</span>
                <span class="info-box-number">
                <span class="info-box-number">Stocked <?php echo $harvest,'/',$stock;?></span>
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
                <span class="info-box-number"><?php echo $prod_number;?></span>
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
                <span class="info-box-number">0</span>
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
                <span class="info-box-text">Fingerlings</span>
                <span class="info-box-number"><?php echo number_format($fingerlings,2);?></span>
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
                <h3 class="card-title">Stock Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pond Number</label>
                    <select class="form-control" type="text" name="pond_number"  id="exampleInputPassword1" data-placeholder="Select a Pond" style="width: 100%;">
                    <option value="<?php echo $pond;?>"><?php echo $pond;?></option>
                   </select>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Release Fingerlings</label>
                    <input type="number" name="fingerlings" value="<?php echo $fingerlings;?>" class="form-control" id="exampleInputPassword1" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Biomass Applied</label>
                    <input type="number" name="biomass" value="<?php echo $biomass;?>" class="form-control" id="exampleInputPassword1" placeholder="Biomass">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Probiotic Applied</label>
                    <input type="number" name="probiotic" value="<?php echo $probiotic;?>" class="form-control" id="exampleInputPassword1" placeholder="Probiotic">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Feeds Applied</label>
                    <input type="number" name="feeds" value="<?php echo $feeds;?>" class="form-control" id="exampleInputPassword1" placeholder="Feeds">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock Date</label>
                    <input type="date" name="stock_date" value="<?php echo $stockdate;?>" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y-m-d');?>"/>
                  </div>
                  </div>
                  <div class="col-md-8">
                <div class="form-group">
                  <label>Employee Attended</label>
                  <select class="select2" name="employee" multiple="multiple"  data-placeholder="<?php echo $employee;?>" id="exampleInputPassword1" style="width: 100%;">
                  <option value="<?php echo $employee;?>"><?php echo $employee;?></option> 
                  </select>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <input type="text" name="remarks"  value="<?php echo $remarks;?>" class="form-control" id="exampleInputPassword1" placeholder="Stock Details"/>
                  </div>
                </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="margin-left:30%" type="submit" name="addStock" class="btn btn-sm btn-primary">Update Record</button>
                  <button style="margin-left:10%" type="reset" name="addStock" class="btn btn-sm btn-primary">Clear Data </button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    <!-- For footer -->
    <?php include '../includes/footer.php';?>

    <!-- For footerscripts -->
    <?php include '../includes/footerScripts.php';?>

  <!-- For addscripts -->
  <?php include '../phpSource/addScripts.php';?>

