<?php include_once("includes/dbconnection.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER | HILLOWS TRANSPORT</title>
<style>
.note{
    background: whitesmoke;
    display:flex;
    padding-bottom: 50px;
}
.sub-note{
    background:white;
    width:80%;
    margin:auto;
    justify-content:center;
    margin-top:20px;
    padding-bottom: 20px;
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
<?php include_once("includes/header.php");  ?><br>
<br>
<section class="note">
<?php  
                      $email = $_SESSION['company_email']
                    ?>
      <div class="sub-note">
            <center><h3 style="font-style:italic;">NOTIFICATION</h3></center>
            <hr>
            <?php   
              
                $valtable = mysqli_query($conn,"select * from customer join pickup on customer.customer_id=pickup.customer_id where company_email='$email' and notification=1");
                if(mysqli_num_rows($valtable) > 0){
                    ?>
           <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cargo Ref N.0</th>
                        <th>Shipping From</th>
                        <th>Shipping To</th>
                        <th>Pickup Time</th>
                        <th>Pickup Date</th>
                        <th>Driver Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $select = mysqli_query($conn,"select * from cargo join pickup on cargo.cargo_id=pickup.cargo_id join customer on customer.customer_id=cargo.customer_id join staff on staff.staff_id=pickup.staff_id where company_email='$email' and notification=1");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         $pick_id = $rowcompany['pick_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['ref_number']; ?></td>
                            <td><?php echo $rowcompany['shipping_from'];?></td>
                            <td><?php echo $rowcompany['shipping_to'];?></td>
                            <td><?php echo $rowcompany['pick_time'];?> hrs</td>
                            <td><?php echo $rowcompany['pick_date'];?></td>
                            <td><?php echo $rowcompany['first_name']. ' '.$rowcompany['last_name'];?></td>
                            <td>
                            <button class="btn btn-primary" style="float:right;"><a href="close.php?pick_id=<?php echo $pick_id; ?>" style="color:white !important;text-decoration:none;">Clear Notification</a></button>
                            </td>
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>
<!-- ####################################################################################### -->
                <?php
                }else{
                    ?>
                          <button class="btn btn-primary" style="float:right;"><a href="dashboard.php" style="color:white !important;text-decoration:none;">Close Notification</a></button>
                    <?php
                }
            
            ?>
            
               
               
      </div>
</section>
</main><br>
<br>
<?php include_once("../includes/footer.php");?>
</body>
</html>