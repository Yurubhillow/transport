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
            <!-- <h4 style = "color:red">HILLOWS TRANSPORT</h4> -->
            <!-- <h4 style = "background:red;">HILLOWS TRANSPORT</h4> -->
            <h4>HILLOWS TRANSPORT</h4>
        <div class="div-action pull pull-right" style="padding-bottom:20px;">
          <button class="btn btn-primary button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Staff</button>
        </div> <!-- /div-action --> <br>
        <br>
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
                        <th>Fullnames</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>vehicle Reg.No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $select = mysqli_query($conn,"select * from staff where state='Active'");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         $staff_id = $rowcompany['staff_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['first_name']. ' '. $rowcompany['last_name']; ?></td>
                            <td><?php echo $rowcompany['gender'];?></td>
                            <td><?php echo $rowcompany['contact'];?></td>
                            <td style="text-transform: uppercase;"><?php echo $rowcompany['reg_number'];?></td>
                            <td><?php echo $rowcompany['s_status'];?></td>
                            <td> 
                            
                              <button class="btn btn-primary"><a href="updateStaff.php?staff_id=<?php echo $staff_id;?>" style="color:white;text-decoration:none;"> Edit Staff</a></button>
                              <button class="btn btn-danger"><a href="deleteStaff.php?staff_id=<?php echo $staff_id;?>" onclick="return confirm('Are you sure you want to Delete Staff below');" style="color:white;text-decoration:none;"> Remove Staff</a></button>
                        
                           </td>
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>






           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</main><br>
<br>
<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="submitBrandForm" action="backend/staff.php" method="POST">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"><i class="fa fa-plus"></i> Add Staff</h3>
        </div>

      <div class="modal-body"> 
          
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">First Name:</label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required>
                </div>
          </div><!-- /form-group--> 

          <div class="form-group">
            <label for="branchName" class="col-sm-3 control-label">Last Name</label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="branchName" placeholder="Enter Last Name" name="lastname" autocomplete="off" required="">
            </div>
          </div> <!-- /form-group--> 
          <div class="form-group"> 
            <label for="branchname" class="col-sm-3 control-label">Gender</label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
              <select class="form-control" id="branchname" name="gender" required="">
                <option value="">~~ SELECT GENDER ~~</option>
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
              </select>
            </div>
          </div> <!-- /form-group-->
          <div class="form-group">
            <label for="brandcontact" class="col-sm-3 control-label">Phone Number</label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
             <input type="number" class="form-control" id="contact" placeholder="Phone Number" name="contact" autocomplete="off" required="">
            </div>
          </div> <!-- /form-group-->

          <div class="form-group">
            <label class="control-label col-sm-3" for="contact">Username</label>
            <label class="control-label col-sm-1">:</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required readonly>
            </div>
          </div><!-- /form-group-->

          <div class="form-group">
            <label for="branchlocation" class="col-sm-3 control-label">Vehicle Reg.No</label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
             <input type="text" class="form-control" id="reg_number" placeholder="Enter Vehicle Reg.No" name="reg_number" autocomplete="off" required="">
            </div>
          </div> <!-- /form-group-->  
         <div class="form-group">
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="password" value="123456" name="password" autocomplete="off">
            </div>
          </div> <!-- /form-group-->                    

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->

    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<script>
document.querySelector('#firstName').addEventListener('keyup',function(){

let firstName = this.value;

document.querySelector('#username').value=firstName;
})
</script>
<?php include_once("../includes/footer.php");?>
</body>
</html>