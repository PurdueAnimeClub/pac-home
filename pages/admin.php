<h2>Admin Panel</h2>
<div class="well" id="content">
	<form method="POST" action="admin/login.php" data-parsley-validate role="form" id="form-key">
		<div class="form-group">
			<label class="sr-only" for="key">Admin Key</label>
			<input data-parsley-required type="text" class="form-control" id="key" name="key" placeholder="Enter your admin key">
		</div>
		<button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Log In</button>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			$('#form-key').submit(function(event) {
				var form = $(this);
				$.ajax({
					type: form.attr('method'),
					url: form.attr('action'),
					data: form.serialize()
				}).success(function(data) {
					$('#content').html(data);
				}).fail(function(data) {
					$('#form-key').trigger('reset');
					bootbox.alert(data['responseText']);
				});
				event.preventDefault();
			});
		});
	});
</script>
