<h2>Contact Information</h2>
<div class="well">
	<table class="table table-responsive-npr">
		<thead><tr><th>Position</th><th>Name</th><th>Contact</th></tr></thead>
		<tbody id="contacts"></tbody>
	</table>

	<script type="text/javascript">
		var elements = [
			<?php
				$query = "SELECT * FROM home_contact where Contact <> ''";
				$result = mysqli_query($con, $query);
				while($row = mysqli_fetch_array($result)) {
					echo '["'.$row['Position'].'", "'.$row['Name'].'", "'.str_rot13($row['Contact']).'"],';
				}
			?>
		];
		
		for(var i = 0; i < elements.length; i++) {
			var position = elements[i][0];
			var name = elements[i][1];
			var contact = rot13(elements[i][2]);
			var html = '<tr><td data-title="Position">'+position+'</td><td data-title="Name">'+name+'</td><td data-title="Contact"><a href="mailto:'+contact+'?subject=PAC">'+contact+'</a></td></tr>';
			$("#contacts").append(html);
		}
	</script>
</div>
