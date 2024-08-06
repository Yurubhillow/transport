<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "HILLOWS";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn)
{
	//echo "Connection successful";
}
else
{
	echo "Connection failed!";
}

?>