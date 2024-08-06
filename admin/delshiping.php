<?php include_once("includes/dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN | HILLOWS TRANSPORT</title>
<style>
.sender-parent{
    display:flex;
    justify-content:space-between;
}
.side-sender{
    /* border:1px solid green; */
    flex-basis:48%;
}
.side-receiver{
    /* border:1px solid red; */
    flex-basis:48%;
}
input[type="text"],input[type="number"],select{
    width: 100%;
    height: 40px;
    padding-left: 10px;
}
.sumarry-hero{
    display:flex;
    justify-content:space-around;
}
.sub-hero{
    height:150px;
    flex-basis:22%;
    /* border:2px solid dodgerblue; */
    background:white;
    border-radius:4px;
}
.hero-header{
    /* border:2px solid yellow; */
    text-align:center;
    padding:15px;
}
.hero-body{
    /* border:1px solid green; */
    text-align:center;
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
                      $selectlog = mysqli_query($conn,"select * from admin");
                      $rowlog = mysqli_fetch_array($selectlog);
                    ?>
                        <p>Logged as : <?php echo $rowlog['email'] ;?></p>
                </div>
            </div> 
            <h4>Admin Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="staff.php"><i class="fa fa-users"></i> Manage staff</a></p>
                <p><a href="charges.php"><i class="fa fa-dollar"></i> Shipping Charges</a></p>
                <p><a href="delshiping.php"><i class="fa fa-info-circle"></i> Shipping Requests</a></p>
                <p><a href="cargo.php"><i class="fa fa-truck"></i> Cargo shipping</a></p>
                <p><a href="feedback.php"><i class="fa fa-inbox"></i> Feedback</a></p>
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
                  <li> Welcome back Administrator !!!</li>
               </ul>    
        </div>
        <br>
            <h4>HILLOWS TRANSPORT</h4>
            <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sender Email</th>
                        <th>Receiver Email</th>
                        <th>Cargo Ref N.0</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Balance</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $select = mysqli_query($conn,"select * from customer join shipping on customer.customer_id=shipping.customer_id join cargo on shipping.shipping_id=cargo.shipping_id join payment on cargo.cargo_id=payment.cargo_id where state_cargo='Not taken'");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         $cargo_id = $rowcompany['cargo_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['company_email']; ?></td>
                            <td><?php echo $rowcompany['receiver_email'];?></td>
                            <td><?php echo $rowcompany['ref_number'];?></td>
                            <td><?php echo $rowcompany['total_amount'];?> Kshs</td>
                            <td><?php echo $rowcompany['paid_amount'];?> Kshs</td>
                            <td> <?php echo $rowcompany['balance'];?> Kshs</td>
                            <td>
                            <?php 
                                $left_bal = $rowcompany['balance'];
                                if($left_bal == "0.00"){
                                    ?>
                                      <button class="btn btn-danger"><a href="arrange.php?cargo_id=<?php echo $cargo_id;?>" style="color:white;text-decoration:none;"> Arrange for pick up </a></button>
                                <?php
                                }else{
                                    echo " N / A";
                                }
                            ?>
                            </td>
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>