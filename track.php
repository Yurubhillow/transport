<?php   
  include_once("customer/includes/dbconnection.php");
  if($_POST){
    $ref_number = $_POST['ref_number'];
    $track_cargo = mysqli_query($conn,"select * from cargo where ref_number='$ref_number'");
     if(mysqli_num_rows($track_cargo) > 0){
        $pp = mysqli_fetch_array($track_cargo);
        $vv = $pp['state_cargo'];
        //echo $pp['state_cargo'];
        echo "<script>alert('Your shipment Status :  $vv ')</script>";
        echo "<script>window.location = 'index.php'</script>";
     }
     else{
        echo "<script>alert('Sorry, Wrong Ref Number !!!')</script>";
        echo "<script>window.location = 'index.php'</script>";
     }
  }
?>