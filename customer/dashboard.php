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
            <h4>Sender and Receiver information</h4>
            <div class="sender-form" style="text-align:center;">
                <form action="backend/send.php" method="post">
                     <div class="sender-parent">
                            <div class="side-sender">
                                  <h4>Sender Details</h4>
                                  <?php 
                                    $select = mysqli_query($conn,"select * from customer where company_email='$email'");
                                    $selectrow=mysqli_fetch_array($select);
                                  ?>
                                <input type="text" value="<?php echo $selectrow['company_name'];?>" readonly><br>
                                <br>
                                <input type="text" value="<?php echo $selectrow['company_email'];?>" readonly><br>
                                <br>
                                <input type="text" value="<?php echo $selectrow['company_contact'];?>" readonly><br>
                                <br>
                                <input type="text" value="<?php echo $selectrow['company_address'];?>" readonly><br>
                                <br>
                                <select name="s_location" id="" required>
                                    <option value="">SELECT SENDER LOCATION (CITY)</option>
                                    <option value="NAKURU">NAKURU</option>
                                    <option value="NAIROBI">NAIROBI</option>
                                    <option value="MOMBASA">MOMBASA</option>
                                    <option value="KISUMU">KISUMU</option>
                                </select>
                                <br>
                                <input type="hidden" value="<?php echo $selectrow['customer_id'];?>" name="customer_id">
                            </div>
                            <div class="side-receiver">
                               <h4>Receiver Details</h4>
                                <input type="text" placeholder="Receiver Company name" name="r_name" required><br>
                                <br>
                                <input type="text" placeholder="Receiver Company email" name="r_email" required><br>
                                <br>
                                <input type="number" placeholder="Receiver Phone Number" name="r_phone" required><br>
                                <br>
                                <!-- <input type="text" placeholder="Location"><br>
                                <br> -->
                                <select name="r_location" id="" required>
                                    <option value="">SELECT LOCATION TO (CITY)</option>
                                    <option value="NAKURU">NAKURU</option>
                                    <option value="NAIROBI">NAIROBI</option>
                                    <option value="MOMBASA">MOMBASA</option>
                                    <option value="KISUMU">KISUMU</option>
                                </select><br>
                                <br>
                                <input type="text" placeholder="Enter Physical Address for Receiver" name="r_address" required><br>
                                <br>
                    </div>
                     </div>
                    <input type="submit" value="Next">
                </form>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>