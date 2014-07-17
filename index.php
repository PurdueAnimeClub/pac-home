
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
	<?php 
		include 'includes.php'; 
	?>
  </head>

  <body>

	<!-- Navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<?php 
			include 'navbar.php'; 
		?>
	</div>

	<!-- Content -->
	<div class="container">
		<div class="row clearfix">
			<!-- Page Content -->
			<div class="col-md-8 column">
				<?php 
					$page = $_GET['page'];
					if($page == '') { $page = 'home'; }
					include $page.'.php'; 
				?>
			</div>
			
			<!-- Persistent Sidebar -->
			<div class="col-md-4 column">
				<?php 
					include 'sidebar.php'; 
				?>
			</div>
		</div>
		
		<!-- Footer -->
		<div class="footer">
			<input type="checkbox" class="theme-toggle"
				data-off-text="Light" data-on-text="Dark"
				data-off-theme="light" data-on-theme="dark">
		</div>
		
	</div>
  </body>
</html>

