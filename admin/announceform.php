<form method="POST" action="admin/announce.php" role="form" id="form-announce">
	<input name="key" id="key" type="hidden" value="<?php echo $key; ?>"/>
	<input class="form-control" data-parsley-required maxlength=64 name="title" id="title" type="text" placeholder="Title" />
	<textarea class="form-control" data-parsley-required maxlength=65535 name="announcement" id="announcement" placeholder="Announcement" rows="10"></textarea>
	<button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Announce!</button>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$('#form-announce').parsley();
		$(function() {
			$('#form-announce').submit(function(event) {
				var form = $(this);
				$.ajax({
					type: form.attr('method'),
					url: form.attr('action'),
					data: form.serialize()
				}).success(function(data) {
					bootbox.alert("<h3>Success</h3>" + data);
					$('#form-announce').trigger('reset');
				}).fail(function(data) {
					bootbox.alert("<h3>Error</h3>" + data['responseText']);
				});
				event.preventDefault();
			});
		});
	});
</script>
