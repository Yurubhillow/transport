<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <h4>Sender and Receiver information</h4>
            <div class="sender-form" style="text-align:center;">
                <form action="courierDetails.php" method="post">
                     <div class="sender-parent">
                            <div class="side-sender">
                                  <h4>Sender Details</h4>
                                <input type="text" placeholder="Company name"><br>
                                <br>
                                <input type="text" placeholder="Company email"><br>
                                <br>
                                <input type="text" placeholder="Phone Number"><br>
                                <br>
                            </div>
                            <div class="side-receiver">
                               <h4>Receiver Details</h4>
                                <input type="text" placeholder="Company name"><br>
                                <br>
                                <input type="text" placeholder="Company email"><br>
                                <br>
                                <input type="number" placeholder="Phone Number"><br>
                                <br>
                                <input type="text" placeholder="Location"><br>
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