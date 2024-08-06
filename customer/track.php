<?php include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.process-form{
    /* border:1px solid green; */
    width:60%;
    margin:auto;
    text-align:center;
}
input[type="text"],input[type="number"]{
    width: 100%;
    height: 40px;
    padding-left: 10px;
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
                        <p>Logged as : Joyce Joyce</p>
                </div>
            </div> 
            <h4>Customer Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="shipments.php"><i class="fa fa-truck"></i> My shipments</a></p>
                <p><a href=""><i class="fa fa-bell"></i> Alerts</a></p>
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
                  <li> Dashboard</li>
               </ul>    
        </div>
        <br>
            <h4>Shipment Tracking</h4>
            <div class="process-form">
                <?php  
                   $shipping_id = $_REQUEST['shipping_id'];
                ?>
            <form action="backend/track.php" method="post">
                <input type="hidden" name="shipping_id" value="<?php echo $shipping_id; ?>">
                <input type="text" name="ref_number" placeholder="Enter tracking Number"><br>
                <br>
                <input type="submit">
              </form>
            </div>
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>