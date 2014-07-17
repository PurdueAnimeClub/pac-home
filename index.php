
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Purdue Anime Club">
	<meta name="author" content="PAC">
	<link rel="icon" href="favicon.ico">

	<title>Purdue Anime Club</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/bootstrap/css/flatly.min.css" rel="stylesheet">
	
	<!-- Bootstrap Switch -->
	<link href="assets/bootstrap/switch/css/bootstrap-switch.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/css/custom.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="assets/bootstrap/js/ie10-viewport-bug-workaround.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

	<!-- Navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<?php 
			include 'navbar.php'; 
		?>
	</div>

	<div class="container">
		<div class="row clearfix">
			<!-- Main Content -->
			<div class="col-md-8 column">
				<?php 
					$page = $_GET['page'];
					if($page == '') { $page = 'home'; }
					include $page.'.php'; 
				?>
			</div>
			<!-- Sidebar -->
			<div class="col-md-4 column">
				<?php 
					include 'sidebar.php'; 
				?>
			</div>
		</div>
		
		<center><input type="checkbox" name="dark-toggle" data-off-text="Light" data-on-text="Dark"></center>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap/switch/js/bootstrap-switch.min.js"></script>
	
	<!-- Nav bar JavaScript-->
	<script type="text/javascript">
		// Bootstrap switch
		$("[name='dark-toggle']").bootstrapSwitch();
		
		// Set active tab
		var url = window.location;
		$('ul.nav a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');
	</script>
	
  </body>
</html>

