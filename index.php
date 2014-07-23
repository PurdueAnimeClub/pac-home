<?php 
	function rmspace($buffer){ 
		return preg_replace('~>\s*\n\s*<~', '><', $buffer); 
	};
	ob_start("rmspace");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php
		include 'head.php';
		include 'init.php'; 
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
					include 'pages/'.$page.'.php';
				?>
			</div>
			
			<!-- Persistent Sidebar -->
			<div class="col-md-4 column">
				<?php 
					if($sidebar == '') { $sidebar = 'sidebar'; }
					include 'sidebars/'.$sidebar.'.php';
				?>
			</div>
		</div>
	</div>
	
	<?php
		include 'foot.php';
	?>
	
  </body>
</html>
<?php ob_end_flush(); ?>
