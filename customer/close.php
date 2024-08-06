<?php
include("includes/dbconnection.php");
$pick_id = $_REQUEST['pick_id'];
$message = "";
$delete = mysqli_query($conn, "update pickup set notification=2 where pick_id='$pick_id'");
if($delete)
{
	    header("location:dashboard.php");
}
else
{
	$message = "Error";
	header("location:dashboard.php?message=$message");
}
 ?>