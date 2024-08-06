<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
   $amount = $_POST['amount'];
   $update = mysqli_query($conn,"update charges set amount='$amount'");
   if($update){
        $message = "Charges updated successfully.";
        header("location:../charges.php?message=$message");
   }
   else{
    $message = "error.";
    header("location:../charges.php?message=$message");
   }
}
?>