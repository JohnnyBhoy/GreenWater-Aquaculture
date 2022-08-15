<!--Get the production number-->
        <?php  
  $prod_number= "SELECT prod_number FROM production ORDER BY prod_number DESC LIMIT 1";
  $qry= $con->prepare($prod_number);
  $qry->execute();
  $qry->bind_result($prod_number);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>
<!--Get the stock number-->
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
<!--Get the used pond-->
<?php
$sql = "SELECT * FROM pond where used = 0 ORDER BY pond ASC";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0 )
{
   while($row = mysqli_fetch_assoc($result)) {
     date('Y');
}}
?>
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

<!--**Count the fingerlings release-->
<?php  
  $fingerlings_total= "SELECT SUM(fingerlings) FROM production";
  $qry= $con->prepare($fingerlings_total);
  $qry->execute();
  $qry->bind_result($fingerlings_total);
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
  $harvest= "SELECT count(stock_number) FROM production where   remarks IN ('Harvested','harvest','Harvest')  and prod_number =".$prod_number;
  $qry= $con->prepare($harvest);
  $qry->execute();
  $qry->bind_result($harvest);
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

<!--Get the stock number-->
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
<!--Get the used pond-->
<?php
$sql = "SELECT * FROM pond where used = 0 ORDER BY pond ASC";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0 )
{
   while($row = mysqli_fetch_assoc($result)) {
     date('Y');
}}
?>

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
  
  /*Total harvested fish*/
  $fishes= "SELECT SUM(fish) FROM harvest where prod = $prod";
  $qry= $con->prepare($fishes);
  $qry->execute();
  $qry->bind_result($fishes);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}

  /*Total harvested/stock fingerlings*/
  $tfingerlings= "SELECT SUM(fingerlings) FROM production where prod_number = $prod and remarks='Harvested'";
  $qry= $con->prepare($tfingerlings);
  $qry->execute();
  $qry->bind_result($tfingerlings);
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

<!--**date start the harvest-->
<?php  
  $dated= "SELECT SUBSTRING(dated,1,7) FROM harvest ORDER BY harvest ASC LIMIT 1";
  $qry= $con->prepare($dated);
  $qry->execute();
  $qry->bind_result($dated);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>

<!--**date end the harvest-->
<?php  
  $mdated= "SELECT SUBSTRING(dated,1,7) FROM harvest ORDER BY harvest DESC LIMIT 1";
  $qry= $con->prepare($mdated);
  $qry->execute();
  $qry->bind_result($mdated);
  while($qry->fetch()){
  $datelog = date("m/d/Y h:i:sa");}
?>