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
input[type="text"],input[type="number"],input[type="time"],input[type="date"],select{
    width: 80%;
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
.sender-form{
    width:60%;
    margin:auto !important;
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
            <h4>UPDATE STAFF</h4>
            <div class="sender-form">
                       <form action="backend/updateStaff.php" method="post">
                    <label for="">Phone Number: </label><br>
                    <?php 
                       $staff_id = $_REQUEST['staff_id'];
                       $selectcargo = mysqli_query($conn,"select * from staff where staff_id='$staff_id'");
                       $rowcargo = mysqli_fetch_array($selectcargo);
                    ?>
                    <input type="text" value="<?php echo $rowcargo['contact'];?>" name="phone"><br>
                    <br>
                    <label for="">Vehicle Reg.No: </label><br>
                    <input type="text" value="<?php echo $rowcargo['reg_number'];?>" name="reg"><br>
                    <br>
                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                    <div class="footer-button">
                        <input type="submit" value="Update Details">
                    </div>
                </form>
            </div> 
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>