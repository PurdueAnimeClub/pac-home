<?php
function get_news($con, $index) {
	$query = "SELECT * FROM home_announcements ORDER BY Date DESC LIMIT ".$index.", 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	if(isset($row)) {
		$date = date("F d, Y", strtotime($row['Date']));
		$title = htmlspecialchars($row['Title']);
		$author = htmlspecialchars($row['Author']);
		$content = nl2br(htmlspecialchars($row['Content']));
		$return = '<h4>'.$title.'</h4><p><small>'.$date.' by '.$author.'</small></p>'.'<p>'.$content.'</p>';
		return $return;
	} else {
		return '';
	}
}
?>
