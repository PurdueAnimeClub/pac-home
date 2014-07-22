<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include 'dbconfig.php';
$con = mysqli_connect($db_address,$db_user,$db_password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['id'];
$valid = isset($id) && $id != '' && strpos(get_headers("http://gdata.youtube.com/feeds/api/videos/".$id, 1)[0], '200');
$success = FALSE;

if($valid) {
	$title="";
	$status="suggestion";
	$query = "INSERT INTO home_theater (Video, Title, Status) VALUES ('".$id."', '".$title."', '".$status."');";
	$success = (mysqli_query($con, $query) != FALSE);
}

if($success) {
	http_response_code(200);
	echo "Submitted.";
} else {
	http_response_code(400);
	echo "An error occurred: ".mysqli_error($con);
}
?>
