<?php
include("includes/dbconnection.php");
$cargo_id = $_REQUEST['cargo_id'];
$message = "";
$delete = mysqli_query($conn, "update cargo set state_cargo='Delivered' where cargo_id='$cargo_id'");
if($delete)
{
    $message = "Cargo Delivered";
	header("location:dashboard.php?message=$message");
}
else
{
	$message = "Error";
	header("location:dashboard.php?message=$message");
}
 ?>