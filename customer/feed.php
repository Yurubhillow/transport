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
input[type="submit"]{
    width: 10% !important;
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
            <h4>Cargo for Delivery</h4>
           
            <div class="processssss-form">
            <form action="backend/feed.php" method="post">
            <label for="">Message</label><br>
            <textarea name="message" id="" cols="60" rows="10">

            </textarea><br>
            <br>
            <?php 
              $sel = mysqli_query($conn,"select * from customer where company_email='$email'");
              $rowsel = mysqli_fetch_array($sel);
            ?>
            <input type="hidden" name="email" value="<?php echo $rowsel['company_email'] ;?>">
            <input type="submit" value="Send">
            </form>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>