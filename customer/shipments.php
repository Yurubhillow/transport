<?php include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER | HILLOWS TRANSPORT</title>
<style>
.process-form{
    /* border:1px solid green; */
    width:60%;
    margin:auto;
    text-align:center;
}
select{
    width: 80%;
    height: 40px;
    padding-left: 10px;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 15px !important;
}

tr:nth-child(even){background-color: white}

th {
  background-color: dodgerblue;
  color: white;
  /* padding:20px !important; */
}
.quick-links{
    /* border:5px solid green; */
    padding-left:10px !important;
}
.badge{
    background:dodgerblue !important;
} 
</style>
</head>
<body>
<main>
<?php include_once("includes/header.php");  ?>
    <section class="main-dashboard">
        <div class="left-bar">
           <div class="logged">
                <div class="logged-1">
                    <div class="user-icon">
                            <img src="../images/user.png" alt="">
                    </div><br>
                    <?php  
                      $email = $_SESSION['company_email']
                    ?>
                        <p>Logged as : <?php echo $email; ?></p>
                </div>
            </div> 
            <h4>Customer Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="shipments.php"><i class="fa fa-info-circle"></i> My shipments</a></p>
                <p><a href="delshiping.php"><i class="fa fa-truck"></i> My Cargo</a></p>
                <p><a href="alert.php"><i class="fa fa-bell"></i> Alerts <span class="badge">
                    <?php  
                       $take = mysqli_query($conn,"select * from customer join pickup on customer.customer_id=pickup.customer_id where company_email='$email' and notification=1 ");
                       $countt = mysqli_num_rows($take);
                       echo $countt;
                    ?>
                </span></a></p>
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
                <ul>
                  <li> Welcome back customer !!!</li>
               </ul>    
        </div>
        <br>
            <h4>My shipment Details</h4>
            <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
            <div class="processssss-form">
               <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Receiver Email</th>
                        <th>Cargo Ref N.0</th>
                        <th>Destination</th>
                        <th>Cargo weight</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       //$select = mysqli_query($conn,"select * from customer join shipping on customer.customer_id=shipping.customer_id join cargo on shipping.shipping_id=cargo.shipping_id  where company_email='$email'");
                       $select = mysqli_query($conn,"select * from customer join shipping on customer.customer_id=shipping.customer_id join cargo on shipping.shipping_id=cargo.shipping_id join payment on cargo.cargo_id=payment.cargo_id where company_email='$email'");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         $shipping_id = $rowcompany['shipping_id'];
                         $cargo_id = $rowcompany['cargo_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['receiver_email'];?></td>
                            <td><?php echo $rowcompany['ref_number'];?></td>
                            <td><?php echo $rowcompany['receiver_location'];?></td>
                            <td><?php echo $rowcompany['cargo_weight'];?> KGs</td>
                            <td> <?php echo $rowcompany['grand_total'];?> Kshs</td>
                            <td><?php 
                               $bale = $rowcompany['balance'];
                               if($bale == "0.00"){
                                   echo "Full payment done";
                               }
                               else{
                                   echo "Partial payment done";
                               }
                              ?>
                              </td>
                            <td>
                            <?php   
                               $bales = $rowcompany['balance'];
                               if($bales == "0.00"){
                                ?>
                                 <button class="btn btn-success"><a href="track.php?shipping_id=<?php echo $shipping_id;?>" style="color:white;text-decoration:none;">Track my cargo</a></button>
                                <?php
                               }else{
                                ?>
                                   <button class="btn btn-primary"><a href="pay.php?cargo_id=<?php echo $cargo_id;?>" style="color:white;text-decoration:none;">Make payment</a></button>
                                <?php
                               }
                               
                            
                            ?>
                            
                            </td>
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>