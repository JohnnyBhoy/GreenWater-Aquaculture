<?php include '../phpSource/helpers.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
    <section class="content" style="margin-top:5%">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <form action="" method="post"> 
          <div class="row mb-12">
          <div class="col-sm-9">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Production Number</a></label>
                    <input class="form-control" style="text-align:center;width:20%" value="<?php   if($prod_number==""){echo "1";} else{echo $prod_number;}?>" 
                    type="number" name="prod_number" id="exampleInputEmail1"/>
          </div>
          </div>
          <div class="col-sm-3">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Stock Number  </a></label>
                    <input class="form-control" style="text-align:center;width:60%" value="<?php echo $stock_number + 1;?>" 
                    type="number"  name="stock_number" id="exampleInputEmail1"/>
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
                <h3 class="card-title">Stock Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pond Number&nbsp;&nbsp;</label> 
                    <i class="fa fa-plus"  data-toggle="modal" data-target="#modal-sm"></i>
                    <select class="form-control" type="text" name="pond_number"  id="exampleInputPassword1" data-placeholder="Select a Pond" style="width: 100%;">
                    <?php
                    $sql = "SELECT * FROM pond where used = 0 ORDER BY pond ASC";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result)> 0 )
                    {
                       while($row = mysqli_fetch_assoc($result)) {
                         echo ' 
                         <option value="'.$row['pond'].'">'.$row['pond'].'</option>  
                        '  ;
                    }}
                    ?>
                   </select>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Release Fingerlings</label>
                    <input type="number" name="fingerlings" class="form-control" id="exampleInputPassword1" placeholder="Fingerlings" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Biomass Applied</label>
                    <input type="number" name="biomass" class="form-control" id="exampleInputPassword1" placeholder="Biomass">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Probiotic Applied</label>
                    <input type="number" name="probiotic" class="form-control" id="exampleInputPassword1" placeholder="Probiotic">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Feeds Applied</label>
                    <input type="number" name="feeds" class="form-control" id="exampleInputPassword1" placeholder="Feeds">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock Date</label>
                    <input type="date" name="stock_date" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y-m-d');?>"/>
                  </div>
                  </div>
                  <div class="col-md-8">
                <div class="form-group">
                  <label>Employee Attended&nbsp;&nbsp;</label> 
                    <i class="fa fa-plus"  data-toggle="modal" data-target="#modal-sm2"></i>
                  <select class="select2" name="employee" multiple="multiple"  id="exampleInputPassword1" data-placeholder="Select a Worker" style="width: 100%;">
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
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <input type="text" name="remarks" class="form-control" id="exampleInputPassword1" placeholder="Stock Details"/>
                  </div>
                </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="margin-left:30%" type="submit" name="addStock" class="btn btn-sm btn-primary">Add Stock</button>
                  <button style="margin-left:10%" type="reset" name="addStock" class="btn btn-sm btn-primary">Clear Data </button>
                </div>
              </form>
            </div>
            <!-- /.card -->

   <!-- Add pond modal-->
     <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Pond</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Please Enter number</label>
                    <input type="number" name="pond" class="form-control" value="<?php echo $pond_total + 1;?>" id="exampleInputPassword1" />
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" name="addPond" class="btn btn-primary">Save Pond</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </div>
         </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

     <!-- Add employee modal-->
     <div class="modal fade" id="modal-sm2">
        <div class="modal-dialog modal-sm2">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="fname" class="form-control" />
                    <label>Work / Job</label>
                    <input type="text" name="job" class="form-control" />
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" name="addEmp" class="btn btn-primary">Save Worker</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </div>
         </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

