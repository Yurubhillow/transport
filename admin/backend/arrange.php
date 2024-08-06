<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $s_from = $_POST['s_from'];
    $s_to = $_POST['s_to'];
    $staff_id = $_POST['staff_id'];
    $pick_time = $_POST['pick_time'];
    $pick_date = $_POST['pick_date'];
    $cargo_id = $_POST['cargo_id'];
    $customer_id = $_POST['customer_id'];
    //INSERT DATA
    $insert = mysqli_query($conn,"insert into pickup (shipping_from,shipping_to,staff_id,pick_time,pick_date,cargo_id,customer_id) values ('$s_from','$s_to','$staff_id','$pick_time','$pick_date','$cargo_id','$customer_id')");
    if($insert){
        $message = "Cargo ready for pickup.";
        header("location:../delshiping.php?message=$message");
        $update = mysqli_query($conn,"update cargo set state_cargo='Ready for pickup' where cargo_id='$cargo_id'");
    }else{
        $message = "Error.";
        header("location:../delshiping.php?message=$message");
    }
}
?>