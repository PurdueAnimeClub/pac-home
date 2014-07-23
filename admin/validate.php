<?php
include '../dbconfig.php';
$con = mysqli_connect($db_address,$db_user,$db_password,$db_name);

function validateKey($k) {
	include '../dbconfig.php';
	$con = mysqli_connect($db_address,$db_user,$db_password,$db_name);
	$query = "SELECT * FROM home_admins";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result)) {
		if($k == $row['Key']) {
			return $row['Name'];
		}
	}
	return NULL;
}
?>
