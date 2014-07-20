<?php
include 'dbconfig.php';
$con = mysqli_connect($db_address,$db_user,$db_password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
include 'getnews.php';
include 'config.php';
?>
