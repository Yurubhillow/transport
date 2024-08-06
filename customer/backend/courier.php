<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $cargo_dec = $_POST['cargo_dec'];
    $cargo_weight = $_POST['cargo_weight'];
    $amount = $_POST['amount'];
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $infor_id = $_POST['infor_id'];
    $customer_id = $_POST['customer_id'];
    //ref_number
    $ref = "HILLOW0A1";
    $random = $infor_id + (2 * 3);
    $my_random = $ref . $random;

    if($sender == $receiver){
        //calculate
        $total_amount = $cargo_weight * $amount;
        $fee_cost = 1000;
        $grand_total = $total_amount + $fee_cost;
        //echo $my_random;
        $insert = mysqli_query($conn,"insert into cargo (cargo_dec,cargo_weight,charges,fee_cost,grand_total,ref_number,customer_id,shipping_id) values('$cargo_dec','$cargo_weight','$amount','$fee_cost','$grand_total','$my_random','$customer_id','$infor_id')");
        if($insert){
            $message = "Cargo details captured successfully.";
	        header("location:../payment.php?message=$message");
            $update = mysqli_query($conn,"update shipping set state='Pending' where shipping_id='$infor_id'");
        }
        else{
            $message = "error.";
	        header("location:../courierDetails.php?message=$message");
        }

    }
    else{
        //calculate
        $total_amount = $cargo_weight * $amount;
        $fee_cost = 1500;
        $grand_total = $total_amount + $fee_cost;
        //echo $my_random;
        $insert = mysqli_query($conn,"insert into cargo (cargo_dec,cargo_weight,charges,fee_cost,grand_total,ref_number,customer_id,shipping_id) values('$cargo_dec','$cargo_weight','$amount','$fee_cost','$grand_total','$my_random','$customer_id','$infor_id')");
        if($insert){
            $message = "Cargo details captured successfully.";
	        header("location:../payment.php?message=$message");
            $update = mysqli_query($conn,"update shipping set state='Pending' where shipping_id='$infor_id'");
        }
        else{
            $message = "error.";
	        header("location:../courierDetails.php?message=$message");
        }
    }
}
?>