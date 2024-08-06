<?php include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAFF | HILLOWS TRANSPORT</title>
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
                      $staff_id = $_SESSION['staff_id'];
                      $select = mysqli_query($conn,"select * from staff where staff_id='$staff_id'");
                      $staff_row= mysqli_fetch_array($select);
                    ?>
                        <p>Logged as : <?php echo $staff_row['first_name']. ' '. $staff_row['last_name']; ?></p>
                </div>
            </div> 
            <h4>Staff Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="shipments.php"><i class="fa fa-user"></i> My Profile</a></p>
                <p><a href="del.php"><i class="fa fa-truck"></i> Delivered Cargo </a></p>
                <!-- <p><a href="alert.php"><i class="fa fa-bell"></i> Alerts <span class="badge"> -->
                    <?php  
                       //$take = mysqli_query($conn,"select * from customer join pickup on customer.customer_id=pickup.customer_id where company_email='$email' and notification=1 ");
                       //$countt = mysqli_num_rows($take);
                       //echo $countt;
                    ?>
                <!-- </span></a></p> -->
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
                  <li> Welcome back staff !!!</li>
               </ul>    
        </div>
        <br>
            <h4>Delivered Cargo</h4>
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
                        <th>Cargo Ref N.0</th>
                        <th>Shipping From</th>
                        <th>Shipping To</th>
                        <th>Pickup Date</th>
                        <th>Arrival Date</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $select = mysqli_query($conn,"select * from cargo join pickup on cargo.cargo_id=pickup.cargo_id join staff on staff.staff_id=pickup.staff_id where state_cargo ='Delivered'");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         $cargo_id = $rowcompany['cargo_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['ref_number']; ?></td>
                            <td><?php echo $rowcompany['shipping_from'];?></td>
                            <td><?php echo $rowcompany['shipping_to'];?></td>
                            <td><?php echo $rowcompany['pick_date'];?></td>
                            <td></td>
                            <td><?php echo $rowcompany['state_cargo'];?></td>
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>



            
        </div>
    </section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>