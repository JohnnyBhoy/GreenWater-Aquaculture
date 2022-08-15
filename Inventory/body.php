<?php  
  $prod_number= "SELECT prod_number FROM production ORDER BY prod_number DESC LIMIT 1";
  $qry= $con->prepare($prod_number);
  $qry->execute();
  $qry->bind_result($prod_number);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<?php  
  if($prod_number == "" || $prod_number == NULL){
    $prod_number = 0;
  }
  else{
    echo " No data found !";
  }
  $stock_number= "SELECT count(prod_number) FROM production where prod_number =".$prod_number;
  $qry= $con->prepare($stock_number);
  $qry->execute();
  $qry->bind_result($stock_number);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<?php
$sql = "SELECT * FROM pond where used = 0 ORDER BY pond ASC";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0 )
{
   while($row = mysqli_fetch_assoc($result)) {
     date('Y');
}}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:2%">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <form action="" method="post"> 
          <div class="row mb-12">
          <div class="col-sm-9">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Inventory Number</a></label>
                    <input class="form-control" style="text-align:center;width:20%" value="<?php   if($prod_number==""){echo "1";} else{echo $prod_number;}?>" 
                    type="number" name="inv" id="exampleInputEmail1"/>
          </div>
          </div>
          <div class="col-sm-3">
          <div class="form-group">
                    <label for="exampleInputEmail1"><a class="breadcrumb-item">Item Number  </a></label>
                    <input class="form-control" style="text-align:center;width:60%" value="<?php echo $stock_number + 1;?>" 
                    type="number"  name="ite" id="exampleInputEmail1"/>
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
                <h3 class="card-title">Inventory Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Item Number/Code</label>
                    <input type="number" name="item_number" class="form-control" id="exampleInputPassword1" placeholder="item number" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type/Classification</label>
                    <select class="form-control" type="text" name="item_type"  id="exampleInputPassword1" data-placeholder="Item Type" style="width: 100%;">
                    <option>Type</option>
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
                    <label for="exampleInputPassword1">Brand Name</label>
                    <input type="text" name="brand" class="form-control" id="exampleInputPassword1" placeholder="brand name" required>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Item Description</label>
                    <input type="text" name="descriptions" class="form-control" id="exampleInputPassword1" placeholder="Description">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Quantity">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Feeds">
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total</label>
                    <input type="number" name="total" class="form-control" id="exampleInputPassword1" placeholder="Total">
                  </div>
                  </div>
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Remarks</label>
                    <input type="text" name="remarks" class="form-control" id="exampleInputPassword1" placeholder="Inventory Details"/>
                  </div>
                </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Inventory Date</label>
                    <input type="date" name="dated" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y-m-d');?>"/>
                  </div>
                  </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="margin-left:30%" type="submit" name="addInventory" class="btn btn-sm btn-primary">Add Item</button>
                  <button style="margin-left:10%" type="reset" class="btn btn-sm btn-primary">Clear Data </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
