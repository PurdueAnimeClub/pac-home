<?php
include 'dbconfig.php';
$con = mysqli_connect($db_address,$db_user,$db_password,$db_name);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		
include 'getnews.php';
include 'config.php';
?>

<!-- Core JavaScript -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-switch.js"></script>

<!-- Custom Javascript -->
<script src="assets/js/custom.js"></script>

<!-- Bootstrap CSS (in case JS is disabled) -->
<link href="assets/css/flatly.css" rel="stylesheet" class="theme-sheet">

<!-- Bootstrap Switch -->
<link href="assets/css/bootstrap-switch.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="assets/css/custom.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="assets/js/html5shiv.js"></script>
  <script src="assets/js/respond.js"></script>
<![endif]-->
