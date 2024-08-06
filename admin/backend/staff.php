<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){

  $firstName = $_POST['firstName'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $username = $_POST['username'];
  $reg_number = $_POST['reg_number'];
  $password = $_POST['password'];
  $encryptancy = base64_encode($password);
  //check firstname
  $checkfirstname = mysqli_query($conn,"select * from staff where first_name='$firstName'");
  if(mysqli_num_rows($checkfirstname) > 0){
    $message = "First already exists.";
    header("location:../staff.php?message=$message");
  }
  else{
    $insert = mysqli_query($conn,"insert into staff (first_name,last_name,gender,contact,username,reg_number,password) values ('$firstName','$lastname','$gender','$contact','$username','$reg_number','$encryptancy')");
    if($insert){
        $message = "Staff added successfully.";
        header("location:../staff.php?message=$message");
    }
    else{
        $message = "Errrror.";
        header("location:../staff.php?message=$message");
    }
  }
}
?>