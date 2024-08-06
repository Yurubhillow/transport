<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $grand = $_POST['grand'];
    $paid = $_POST['paid'];
    $m_ref = $_POST['m_ref'];
    $cargo_id = $_POST['cargo_id'];
    //balance
    $balance = $grand - $paid;
    $insert = mysqli_query($conn,"insert into payment (total_amount,paid_amount,balance,m_ref,cargo_id) values('$grand','$paid','$balance','$m_ref','$cargo_id')");
    if($insert){
        $message = "Payment made successfully.";
        header("location:../shipments.php?message=$message");
        $update = mysqli_query($conn,"update cargo set status='Paid' where cargo_id='$cargo_id'");
    }
    else{
        $message = "Error.";
        header("location:../payment.php?message=$message");
    }
}
?>