<?php   
include("../includes/dbconnection.php");
$message="";
if($_POST){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $password = $_POST['password'];
  $encryptancy = base64_encode($password);
  //checkusername
  $checkusername = mysqli_query($conn,"select * from staff where username='$username'");
  if(mysqli_num_rows($checkusername) > 0){
    
      if($password != $cpassword){
        $message = "Password and Confrim password do not match.";
        header("location:../setting.php?message=$message");
      }
      else{
         $update = mysqli_query($conn,"update staff set password='$encryptancy' where username='$username'");
         if($update)
         {
            $message = "Password changed successfully.";
	        header("location:../dashboard.php?message=$message");
         }
         else{
            $message = "Erroror.";
	        header("location:../setting.php?message=$message");
         }
      }
  }
  else{
    $message = "Enter correct Username";
    header("location:../setting.php?message=$message");
  }

}
?>