<?php
include 'validate.php';
$key = $_POST['key'];
$name = validateKey($key);

if($name == NULL) {
	http_response_code(403);
	die("Access denied.");
}

$title = mysqli_real_escape_string($con, $_POST['title']);
$announcement = mysqli_real_escape_string($con, $_POST['announcement']);
$date = date('Y-m-d H:i:s', time());

$query = "INSERT INTO home_announcements (Date, Title, Author, Content) VALUES ('".$date."', '".$title."', '".$name."', '".$announcement."');";
if(mysqli_query($con, $query)) {
	echo '<p>Announcement posted. <a href="./?page=news">Click here</a> to see it.</p>';
} else {
	http_response_code(500);
	echo "Database Error: ".mysqli_error($con);
}
?>
