
<!-- For helpers-->
<?php include_once '../phpSource/helpers.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:2%">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <form action="" method="post"> 
          <div class="row mb-12">
          <div class="col-sm-9">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Production Number</a></label>
                    <input class="form-control" style="text-align:center;width:20%" value="<?php   if($prod_number==""){echo "1";} else{echo $prod_number;}?>" 
                    type="number" name="prod" id="exampleInputEmail1"/>
          </div>
          </div>
          <div class="col-sm-3">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Harvest Number  </a></label>
                    <input class="form-control" style="text-align:center;width:60%" value="<?php echo $harvest + 1;?>" 
                    type="number"  name="harvest" id="exampleInputEmail1"/>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" style="margin-top:-2%">
      <div class="container-fluid">
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
                    <option>Choose Sock</option>
                    <?php
                    $sql = "SELECT stock_number FROM production where remarks NOT IN ('Harvested','harvest','Harvest')  and  prod_number = $prod_number ORDER BY stock_number ASC";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result)> 0 )
                    {
                       while($row = mysqli_fetch_assoc($result)) {
                         echo ' 
                         <option value="'.$row['stock_number'].'"> Stock # '.$row['stock_number'].'</option>  
                        '  ;
                    }}
                    ?>
                   </select>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fish Total/ piece</label>
                    <input type="number" name="fish" class="form-control" id="exampleInputPassword1" placeholder="Count of Fish" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Weight</label>
                    <input type="number" name="weights" class="form-control" id="exampleInputPassword1" placeholder="Weight in Kilogram" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price/Kg.</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price per Kilo" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Dated</label>
                    <input type="date" name="dated" class="form-control" value="<?php echo date('Y-m-d');?>" id="exampleInputPassword1" placeholder="Stock Details"/>
                  </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                  <label>Employee Attended</label>
                  <select class="form-control" type="text" name="employee"  id="exampleInputPassword1"placeholder="Select a Employee" style="width: 100%;">
                  <option>Choose Worker</option>
                  <?php
                    $sql = "SELECT * FROM employee ORDER BY fname ASC";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result)> 0 )
                    {
                       while($row = mysqli_fetch_assoc($result)) {
                         echo ' 
                         <option value="'.$row['fname'].'">'.$row['fname'].'</option>  
                        '  ;
                    }}
                    ?>
                  </select>
                </div>
                </div>

              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="margin-left:30%" type="submit" name="addHarvest" class="btn btn-sm btn-primary">Add Harvest</button>
                  <button style="margin-left:10%" type="reset" class="btn btn-sm btn-primary">Clear Data </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
