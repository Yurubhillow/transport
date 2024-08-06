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
            <!-- <div class="sender-form" style="text-align:center;">
              
            </div> -->
        <div class="sumarry-hero">
            <div class="sub-hero">
                  <div class="hero-header">
                      <p> <i class="fa fa-users"></i> Customers</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                     <p><?php 
            $streams = $conn->query("SELECT * FROM customer")->num_rows;
             echo $streams;
          ?></p>
                  </div>
            </div>
            <div class="sub-hero">
                  <div class="hero-header">
                      <p><i class="fa fa-users"></i>  Staffs</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                  <p><?php 
            $streams = $conn->query("SELECT * FROM staff")->num_rows;
             echo $streams;
          ?></p>
                  </div>
            </div>
                
            <div class="sub-hero">
                 <div class="hero-header">
                      <p><i class="fa fa-truck"></i>  Inprogress shipping</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                  <p><?php 
            $streams = $conn->query("SELECT * FROM cargo where state_cargo='Pending'")->num_rows;
             echo $streams;
          ?></p>
                  </div>
            </div>
                
            <div class="sub-hero">
                 <div class="hero-header">
                      <p><i class="fa fa-car"></i> Delivered shipping</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                  <p><?php 
            $streams = $conn->query("SELECT * FROM cargo where state_cargo='Delivered'")->num_rows;
             echo $streams;
          ?></p>
                  </div>
            </div>

        </div>
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>