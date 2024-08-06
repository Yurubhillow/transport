<?php include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER | HILLOWS TRANSPORT</title>
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
.payment-form{
    width:90%;
    margin:auto;
}
input[type="submit"]{
    width: 20% !important;
}
.footer-button{
    display:flex;
    justify-content:space-between;
}
.footer-button a{
    height:40px;
    background:tomato;
    padding-top:10px !important;
    width: 20%;
    padding-left:50px;
    color:white;
    text-decoration:none;
}
.footer-button a:hover{
    background:red;
    color:white;
    text-decoration:none;
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
            <h4>Make payment for cargo</h4>
            <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
              <center><img src="../images/mp.png" alt="" width="300" height="300"></center>
            <div class="payment-form">
                <form action="backend/payment.php" method="post">
                    <label for="">Total Amount to be paid</label>
                    <?php 
                       $selectcargo = mysqli_query($conn,"select * from customer join cargo on customer.customer_id=cargo.customer_id where company_email='$email' and status='Pending'");
                       $rowcargo = mysqli_fetch_array($selectcargo);
                    ?>
                    <input type="text" value="<?php echo $rowcargo['grand_total'];?>" name="grand" readonly><br>
                    <br>
                    <label for="">Total amount paid</label>
                    <input type="number" placeholder="Enter Total Amount paid" name="paid" required><br>
                    <br>
                    <label for="m_ref">Mpesa Ref Number</label>
                    <input type="text" placeholder="Enter Confirmation Number" name="m_ref" id="m_ref" pattern=".{8,8}" title="Must be exactly 8 characters" required oninput="validateLength(this)">
                     <br>
                    <br>
                    <input type="hidden" value="<?php echo $rowcargo['cargo_id'];?>" name="cargo_id">
                    <div class="footer-button">
                        <a href="shipments.php">Cancel payment</a>
                        <input type="submit" value="Submit Payment">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
<script>
function validateLength(input) {
    if (input.value.length !== 8) {
        input.setCustomValidity("Must be exactly 8 characters");
    } else {
        input.setCustomValidity("");
    }
}
</script>
</body>
</html>