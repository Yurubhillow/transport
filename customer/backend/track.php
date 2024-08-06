<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $shipping_id = $_POST['shipping_id'];
    $ref_number = $_POST['ref_number'];
    //take cargo_id
    $takecargo = mysqli_query($conn,"select * from cargo where shipping_id='$shipping_id'");
    $rowcargo_id = mysqli_fetch_array($takecargo);
    $cargo_id = $rowcargo_id['cargo_id'];
    //checkpayment
    $payment = mysqli_query($conn,"select * from payment where cargo_id='$cargo_id'");
    $rowpay = mysqli_fetch_array($payment);
    $paycash = $rowpay['balance'];
    if(mysqli_num_rows($payment) > 0){
        if($paycash == "0.00"){
           //select cargo
           $cargo_details = mysqli_query($conn,"select * from cargo join payment on cargo.cargo_id=payment.cargo_id where cargo.cargo_id='$cargo_id'");
           $pp = mysqli_fetch_array($cargo_details);
           $vv = $pp['state_cargo'];
           //echo $pp['state_cargo'];
           echo "<script>alert('Your shipment $vv ')</script>";
           echo "<script>window.location = '../shipments.php'</script>";
        }
        else{
            $message= "Please,Clear your payment for you to track your shippment";
            header("location:../shipments.php?message=$message");
        }
    }
    else{
        $message = "Sorry confirm your shipping payment.";
        header("location:../shipments.php?message=$message");
    }   
}

?>