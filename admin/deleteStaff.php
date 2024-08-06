<?php
include("includes/dbconnection.php");
$staff_id = $_REQUEST['staff_id'];
$message = "";
$delete = mysqli_query($conn, "update staff set state='Inactive' where staff_id='$staff_id'");
if($delete)
{
	    $message = "Staff Deleted";
	    header("location:staff.php?message=$message");
}
else
{
	$message = "Staff not deleted";
	header("location:staff.php?message=$message");
}
 ?>