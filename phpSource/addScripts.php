   <!-- Add pond script -->
   <?php
             if(isset($_POST["addPond"])){
                    $pn=$_POST["pond"];
                    $dated = date('Y-m-d');

                    $sql="SELECT p_id from pond where pond=$pn";
                    $result = mysqli_query($con, $sql);
                    // condition for success or fail
                    if (mysqli_num_rows($result) > 0 ){
                            echo"<script language = 'javascript'>
                            alert('Existed');
                            location='index';
                            </script>";
                    }

                    else{
                        //sql statement
                       $sql="INSERT INTO pond (pond,used,dated) 
                       values('$pn',0,'$dated')";
                       $qry=$con->prepare($sql);

                       // condition for success or fail
                       if($qry->execute()){;
                        echo"<script language = 'javascript'>
                        swal({title: 'Added',
                        text:'Successfully',
                        type : 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        },
                        function(){
                        setTimeout(function(){
                        location = '../Stock/index';
                        });
                        });
                        </script>";
                        }  else {echo "<script language = 'javascript'>
                        alert('Failed');
                        location='index';
                        </script>";
                        }  
                    }
                }

                if(isset($_POST["addJob"])){
                    $job=$_POST["job"];

                    //sql statement
                       $sql="INSERT INTO job (job) 
                       values('$job')";
                       $qry=$con->prepare($sql);
                       
                       // condition for success or fail
                       if($qry->execute()){;
                                echo"<script language = 'javascript'>
                               alert('New Job added');
                               location = 'index.php';
                               </script>";
                       }
               
                       else{
                           echo"<script language = 'javascript'>
                               alert('Failed to Add Job');
                               location = 'index.php';
                               </script>";
                       }
                }

                if(isset($_POST["addEmp"])){
                    $fname=$_POST["fname"];
                    $job=$_POST["job"];
                    $dated=$_POST["dated"];

                    //sql statement
                       $sql="INSERT INTO employee (fname,job,dated) 
                       values('$fname','$job','$dated')";
                       $qry=$con->prepare($sql);
                       
                       // condition for success or fail
                       if($qry->execute()){;
                        echo"<script language = 'javascript'>
                        swal({title: 'Added',
                        text:'Successfully',
                        type : 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        },
                        function(){
                        setTimeout(function(){
                        location = '../Stock/index';
                        });
                        });
                        </script>";
                       }
               
                       else{
                           echo"<script language = 'javascript'>
                               alert('Failed to Add Employee');
                               location = 'index.php';
                               </script>";
                       }
                }

            /**Script to Add Stock**/
                if(isset($_POST["addStock"])){
                    $prod_number=$_POST["prod_number"];
                    $stock_number=$_POST["stock_number"];
                    $pond_number=$_POST["pond_number"];
                    $fingerlings=$_POST["fingerlings"];
                    $feeds=$_POST["feeds"];
                    $biomass=$_POST["biomass"];
                    $probiotic=$_POST["probiotic"];
                    $stock_date=$_POST["stock_date"];
                    $employee=$_POST["employee"];
                    $remarks=$_POST["remarks"];
                    $dated = date('Y-m-d');
                    

                    $updatePond = "UPDATE pond SET used = 1 WHERE pond = '$pond_number'";
                    $qry=$con->prepare($updatePond);
                    $qry->execute();

                    //sql statement
                       $sql="INSERT INTO production (prod_number,stock_number,pond,fingerlings,feeds,biomass,probiotic,stockdate,employee,remarks,dated) 
                       values('$prod_number','$stock_number','$pond_number','$fingerlings','$feeds','$biomass','$probiotic','$stock_date','$employee','$remarks','$dated')";
                       $qry=$con->prepare($sql);
                       
                       // condition for success or fail
                       if($qry->execute()){;
                        echo"<script language = 'javascript'>
                        swal({title: 'Stock Added',
                        text:'Successfully',
                        type : 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        },
                        function(){
                        setTimeout(function(){
                        location = 'index';
                        });
                        });
                        </script>";
                       }
               
                       else{
                           echo"<script language = 'javascript'>
                               alert('Failed to Add Employee');
                               location = 'index';
                               </script>";
                       }
                }

        /**Script to Add Inventory**/
        if(isset($_POST["addInventory"])){
            $inv=$_POST["inv"];
            $ite=$_POST["ite"];
            $item_number=$_POST["item_number"];
            $item_type=$_POST["item_type"];
            $brand=$_POST["brand"];
            $descriptions=$_POST["descriptions"];
            $quantity=$_POST["quantity"];
            $price=$_POST["price"];
            $total=$_POST["total"];
            $remarks=$_POST["remarks"];
            $dated = $_POST["dated"];   
            //sql statement
            
               $add_Item="INSERT INTO inventory (p_id,s_id,item_number,item_type,brand,descriptions,quantity,price,total,remarks,dated) 
               values('$inv','$ite','$item_number','$item_type','$brand','$descriptions','$quantity','$price','$total','$remarks','$dated')";
               $qry=$con->prepare($add_Item);
               
               // condition for success or fail
               if($qry->execute()){;
                echo"<script language = 'javascript'>
                swal({title: 'Item Added',
                text:'Successfully',
                type : 'success',
                showConfirmButton: false,
                timer: 1500,
                },
                function(){
                setTimeout(function(){
                location = 'index';
                });
                });
                </script>";
               }
       
               else{
                   echo"<script language = 'javascript'>
                       alert('Failed to Add Item');
                       location = 'index';
                       </script>";
               }
             }

             
        /**Script to Add Harvest**/
        if(isset($_POST["addHarvest"])){
            $prod=$_POST["prod"];
            $harvest=$_POST["harvest"];
            $stock=$_POST["stock"];
            $fish=$_POST["fish"];
            $weights=$_POST["weights"];
            $price=$_POST["price"];
            $dated=$_POST["dated"];
            $employee=$_POST["employee"];
            $sale = $weights * $price;

            //sql statement
               $remarks = "UPDATE production SET remarks = 'Harvested' where prod_number = $prod and stock_number = $stock";
               $qry=$con->prepare($remarks);
               $qry->execute();
               
               $harvest="INSERT INTO harvest (prod,harvest,stock,fish,weights,price,dated,employee,sale) 
               values('$prod','$harvest','$stock','$fish','$weights','$price','$dated','$employee','$sale')";
               $qry=$con->prepare($harvest);
               
               // condition for success or fail
               if($qry->execute()){;
                echo"<script language = 'javascript'>
                swal({title: 'Harvested',
                text:'Successfully',
                type : 'success',
                showConfirmButton: false,
                timer: 1500,
                },
                function(){
                setTimeout(function(){
                location = 'index';
                });
                });
                </script>";
               }
       
               else{
                   echo"<script language = 'javascript'>
                       alert('Failed to Add Item');
                       location = 'index';
                       </script>";
               }
             }
        ?>

   