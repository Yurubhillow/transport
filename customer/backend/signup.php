<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_contact = $_POST['company_contact'];
    $company_address = $_POST['company_address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $encryptancy = base64_encode($password);
    //CHECK EMAIL, PASSWORD MATCH,COMPANY NAME
    $checkname = mysqli_query($conn,"select * from customer where company_name='$company_name'");
    $checkemail =mysqli_query($conn,"select * from customer where company_email='$company_email'");
    if(mysqli_num_rows($checkname) > 0){
           $message = "Company name exists.";
	       header("location:../signup.php?message=$message");
    }
    elseif(mysqli_num_rows($checkemail) > 0){
        $message = "Company email exists.";
        header("location:../signup.php?message=$message");
    }
    elseif($password != $cpassword){
        $message = "Password and confirm password do not match.";
        header("location:../signup.php?message=$message");
    }
    else{
        $insert = mysqli_query($conn,"insert into customer (company_name,company_email,company_contact,company_address,password) values('$company_name','$company_email','$company_contact','$company_address','$encryptancy')");
        if($insert){
            $message = "Company registration was successfull.";
            header("location:../index.php?message=$message");
        }
        else{
            $message = "Errrror.";
	       header("location:../signup.php?message=$message");
        }
    }
}
?>