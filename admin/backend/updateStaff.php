<?php   
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $phone = $_POST['phone'];
    $reg = $_POST['reg'];
    $staff_id = $_POST['staff_id'];
    //update
    $update = mysqli_query($conn,"update staff set contact='$phone',reg_number='$reg' where staff_id='$staff_id'");
    if($update){
        $message = "Staff details updated successfully.";
        header("location:../staff.php?message=$message");
    }else{
        $message = "Errror.";
        header("location:../staff.php?message=$message");
    }
}
?>