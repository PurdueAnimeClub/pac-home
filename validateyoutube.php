<?php
$id = $_GET['id'];
$valid = isset($id) && $id != '' && strpos(get_headers("http://gdata.youtube.com/feeds/api/videos/".$id, 1)[0], '200');
http_response_code($valid ? 200 : 404);
echo $valid ? "true" : "false";
?>
