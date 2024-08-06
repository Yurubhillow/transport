<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $message = $_POST['message'];
    $email = $_POST['email'];
    $insert = mysqli_query($conn,"insert into feedback (messages,email) values ('$message','$email')");
    if($insert){
        $message = "Feedback send.";
        header("location:../delshiping.php?message=$message");
    }else{
        $message = "Error.";
        header("location:../delshiping.php?message=$message");
    }
}
?>