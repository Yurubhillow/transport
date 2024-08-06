<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $customer_id = $_POST['customer_id'];
    $r_name = $_POST['r_name'];
    $r_email = $_POST['r_email'];
    $r_phone = $_POST['r_phone'];
    $r_location = $_POST['r_location'];
    $r_address = $_POST['r_address'];
    $s_location = $_POST['s_location'];
    $insert = mysqli_query($conn,"insert into shipping (receiver_name,receiver_email,receiver_phone,sender_location,receiver_location,receiver_address,customer_id) values ('$r_name','$r_email ','$r_phone','$s_location','$r_location','$r_address','$customer_id')");
    if($insert){
        $message = "Shipping details entered, Almost there !!!.";
	       header("location:../courierDetails.php?message=$message");
    }
    else{
        $message = "errror.";
	       header("location:../dashboard.php?message=$message");
    }
}
?>