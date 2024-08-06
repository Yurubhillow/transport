<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $balances = $_POST['balances'];
    $paid = $_POST['paid'];
    $m_ref = $_POST['m_ref'];
    $ppay = $_POST['ppay'];

    $cargo_id = $_POST['cargo_id'];
    //balance
    $balance = $balances - $paid;
    $total_paid = $ppay + $paid;
    $insert = mysqli_query($conn,"update payment set paid_amount='$total_paid', balance='$balance', m_ref='$m_ref' where cargo_id='$cargo_id'");
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