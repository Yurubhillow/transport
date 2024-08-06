<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $encryptancy = base64_encode($password);
  if(empty($email) || empty($encryptancy))
  {
       if($email == "")
        {
     	   $message = "Username is required.";
	       header("location:../index.php?message=$message");
        }
     if($encryptancy == "")
     {
     	    $message = "Password is required.";
	        header("location:../index.php?message=$message");
     }
  }
  else
  {
    $login = mysqli_query($conn,"select * from staff where username ='$email' and password ='$encryptancy'");

     if(mysqli_num_rows($login)==1)
         {
              
              $row=mysqli_fetch_array($login);
               
              $staff_id = $row['staff_id'];
              $_SESSION['staff_id']=$staff_id;

               header("location:../dashboard.php");
         }
     else
        {
           $message = "Either username or password is incorrect.";
            header("location:../index.php?message=$message");
        }

  }

}
 ?>