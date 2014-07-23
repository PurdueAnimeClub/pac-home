<?php
// connect to db
include 'validate.php';
$key=$_POST['key'];
$name = validateKey($key);

if($name == NULL) {
	http_response_code(403);
	die("Invalid key");
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-push-8">
			<a href="./?page=admin" class="pull-right btn btn-primary" role="button"><i class="fa fa-key"></i> Log Out</a>
		</div>
		<div class="col-sm-8 col-sm-pull-4">
			<h3>Welcome, <?php echo $name; ?></h3>
		</div>
	</div>
	<div class="row">
		<h4>Actions</h4>
		<?php include 'adminforms.php' ?>
	</div>
</div>

