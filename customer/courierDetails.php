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
    /* text-align:center; */
}
select{
    width: 80%;
    height: 40px;
    padding-left: 10px;
}
input[type="text"],input[type="number"]{
    width: 100%;
    height: 40px;
    padding-left: 10px;
}
textarea{
    width: 100%;
    padding-left: 10px;
}
span{
    font-weight:bolder;
}
.remender p{
    font-style:italic;
    color:red;
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
                      $email = $_SESSION['company_email']
                    ?>
                        <p>Logged as : <?php echo $email; ?></p>
                </div>
            </div> 
            <h4>Customer Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="shipments.php"><i class="fa fa-truck"></i> My shipments</a></p>
                <p><a href="delshiping.php"><i class="fa fa-truck"></i> Delivered shipments</a></p>
                <p><a href=""><i class="fa fa-bell"></i> Alerts</a></p>
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
               <li> Welcome back customer !!!</li>
               </ul>    
        </div>
        <br>
            <h4>Cargo details</h4>
            <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
            <div class="process-form">
                <form action="backend/courier.php" method="post">
            <?php  
                $select = mysqli_query($conn,"select * from customer join shipping on customer.customer_id=shipping.customer_id where company_email='$email' and state='New'");
                $rowdet = mysqli_fetch_array($select);
            ?>
              <label for=""> Cargo description</label><br>
              <br>
                <textarea name="cargo_dec" id="" cols="50" rows="10">
                Enter cargo description Here.....
            </textarea><br>
                <br>
                <input type="text" placeholder="Cargo weight in Kgs" name="cargo_weight"><br>
                <br>
                <?php  
                    $takeamount = mysqli_query($conn,"select * from charges");
                    $charges = mysqli_fetch_array($takeamount);
                ?>
                <label for="">Charges per Kg</label>
                <input type="text" value="<?php echo $charges['amount'];?>" name="amount" readonly><br>
                <br>
                  <div class="remender">
                       <p style="float:right;"><span>Note:</span> On checkout, Shipping fee will be calculated</p>
                  </div>
                  <input type="hidden" value="<?php echo $rowdet['sender_location']; ?>" name="sender">
                  <input type="hidden" value="<?php echo $rowdet['receiver_location']; ?>" name="receiver">
                  <input type="hidden" value="<?php echo $rowdet['shipping_id']; ?>" name="infor_id">
                  <input type="hidden" value="<?php echo $rowdet['customer_id']; ?>" name="customer_id">
                    <input type="submit" value="CheckOut">
                </form>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>